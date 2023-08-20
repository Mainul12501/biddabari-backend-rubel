<?php

namespace App\Http\Controllers\Backend\JobCircularManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\CircularManagement\CircularCategory;
use Illuminate\Http\Request;

class JobCircularCategoryController extends Controller
{
    protected $circularCategory;
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//        return view('backend.circular-management.circular-category.index', [
//            'circularCategories'    => CircularCategory::all(),
//        ]);
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        CircularCategory::saveOrUpdateCircularCategory($request);
//        return back()->with('success', 'Circular Category Created Successfully.');
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(string $id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(string $id)
//    {
//        return response()->json(CircularCategory::find($id));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, string $id)
//    {
//        CircularCategory::saveOrUpdateCircularCategory($request, $id);
//        return back()->with('success', 'Circular Category Updated Successfully.');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(string $id)
//    {
//        $this->circularCategory = CircularCategory::find($id);
//        if (file_exists($this->circularCategory->image))
//        {
//            unlink($this->circularCategory->image);
//        }
//        $this->circularCategory->delete();
//        return back()->with('success', 'Circular Category Deleted Successfully.');
//    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.circular-management.circular-category.index', [
            'categories'      => CircularCategory::where('parent_id', 0)->orderBy('order', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function saveNestedCategories (Request $request)
    {
        $json = $request->nested_category_array;
        $decoded_json = json_decode($json, TRUE);

        $simplified_list = [];
        $this->recur1($decoded_json, $simplified_list);

        DB::beginTransaction();
        try {
            $info = [
                "success" => FALSE,
            ];

            foreach($simplified_list as $k => $v){
                $category = CircularCategory::find($v['category_id']);
                $category->fill([
                    "parent_id" => $v['parent_id'],
                    "order" => $v['sort_order'],
                ]);

                $category->save();
            }

            DB::commit();
            $info['success'] = TRUE;
        } catch (\Exception $e) {
            DB::rollback();
            $info['success'] = FALSE;
        }

        if($info['success']){
            $request->session()->flash('success', "All Categories updated.");
        }else{
            $request->session()->flash('error', "Something went wrong while updating...");
        }
        if ($request->ajax())
        {
            return response()->json('Order Updated');
        } else {
            return redirect(route('circular-categories.index'));
        }
    }

    public function recur1($nested_array=[], &$simplified_list=[]){

        static $counter = 0;

        foreach($nested_array as $k => $v){

            $sort_order = $k+1;
            $simplified_list[] = [
                "category_id" => $v['id'],
                "parent_id" => 0,
                "sort_order" => $sort_order
            ];

            if(!empty($v["children"])){
                $counter+=1;
                $this->recur2($v['children'], $simplified_list, $v['id']);
            }

        }
    }

    public function recur2($sub_nested_array=[], &$simplified_list=[], $parent_id = NULL){

        static $counter = 0;

        foreach($sub_nested_array as $k => $v){

            $sort_order = $k+1;
            $simplified_list[] = [
                "category_id" => $v['id'],
                "parent_id" => $parent_id,
                "sort_order" => $sort_order
            ];

            if(!empty($v["children"])){
                $counter+=1;
                return $this->recur2($v['children'], $simplified_list, $v['id']);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CircularCategory::saveOrUpdateCircularCategory($request);
        if ($request->ajax())
        {
//            $request->session()->flash('success', "Course Category created successfully.");
            return response()->json('Circular Category created successfully.');
        } else {
            return back()->with('success', 'Circular Category Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $this->circularCategory = CircularCategory::find($id);
        if ($request->ajax())
        {
            return response()->json($this->circularCategory);
        }
        return 'only for ajax request';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        CircularCategory::saveOrUpdateCircularCategory($request, $id);
        if ($request->ajax())
        {
            return response()->json('Circular Category updated successfully.');
        } else {
            return back()->with('success', 'Circular Category updated successfully.');
        }
    }
    public function test (Request $request)
    {
        return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->deleteNestedCategory(CircularCategory::find($id));
        return back()->with('success', 'Circular Category deleted successfully');
    }

    protected function deleteNestedCategory ($category)
    {
        if (file_exists($category->image))
        {
            unlink($category->image);
        }
        if (!empty($category->circularCategories))
        {
            foreach ($category->circularCategories as $subCategory)
            {
                $this->deleteNestedCategory($subCategory);
            }
        }
        $category->delete();
    }
}
