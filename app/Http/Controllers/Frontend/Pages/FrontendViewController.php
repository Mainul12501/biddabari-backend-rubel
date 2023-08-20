<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Order\ProductOrderRequest;
use App\Models\Backend\BlogManagement\Blog;
use App\Models\Backend\BlogManagement\BlogCategory;
use App\Models\Backend\CircularManagement\Circular;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Backend\ProductManagement\Product;
use App\Models\Backend\UserManagement\Teacher;
use App\Models\Frontend\AdditionalFeature\ContactMessage;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontendViewController extends Controller
{
    protected $courseCategories, $courseCategory, $courses, $course, $courseCoupon, $courseCoupons = [], $teachers = [], $blogs = [], $blogCategories = [], $blog, $blogCategory;
    protected $message, $status, $notices = [], $notice, $products = [], $product, $data, $exams = [], $examCategories = [], $homeSliderCourses = [];
    protected $comments = [];
    public function allProducts ()
    {
        $this->products = Product::whereStatus(1)->select('id','product_author_id','title','image','price', 'discount_amount', 'discount_start_date', 'discount_end_date', 'slug')->paginate(12);
        foreach ($this->products as $product)
        {
            if (!empty($product->discount_start_date) && !empty($product->discount_end_date))
            {
                if (Carbon::now()->between(dateTimeFormatYmdHi($product->discount_start_date), dateTimeFormatYmdHi($product->discount_end_date)))
                {
                    $product->has_discount_validity = 'true';
                }
            } else {
                $product->has_discount_validity = 'false';
            }
        }
        $this->data = [
            'products'  => $this->products
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.product.all-products');
    }

    public function productDetails($id, $slug = null)
    {
        $this->product = Product::where('slug',$slug)->select('id', 'product_author_id', 'title', 'image', 'featured_pdf', 'slug', 'description','price','discount_amount','discount_start_date','discount_end_date','about','specification','other_details' , 'stock_amount', 'is_featured', 'status')->first();
        if (!empty($this->product->discount_start_date) && !empty($this->product->discount_end_date))
        {
            if (Carbon::now()->between(dateTimeFormatYmdHi($this->product->discount_start_date), dateTimeFormatYmdHi($this->product->discount_end_date)))
            {
                $this->product->has_discount_validity = 'true';
            }
        } else {

            $this->product->has_discount_validity = 'false';
        }
        $this->comments = ContactMessage::where(['status' => 1, 'type' => 'product', 'parent_model_id' => $this->product->id])->get();
        $this->data = [
            'product'   => $this->product,
            'comments'  => $this->comments
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.product.product-details');
    }

    public function placeProductOrder (ProductOrderRequest $request)
    {;
        if (auth()->check())
        {
            try {
                foreach (Cart::getContent() as $item)
                {
                    $request->total_amount  = $item->price;
                    ParentOrder::storeXmOrderInfo($request, $item->id);
                }
                Cart::clear();
                return redirect()->route('front.home')->with('success', 'Products ordered submitted successfully.');
            } catch (\Exception $exception)
            {
                return back()->with('error',$exception->getMessage());
//            return response()->json($exception->getMessage());
            }
        } else {
            return redirect()->route('login', ['rt' => base64_encode(url()->previous())])->with('error', 'Please Login First.');
        }
    }

    public function viewCart ()
    {
        $this->data = [
            'cartContents'  => Cart::getContent(),
            'subTotal'      => Cart::getSubTotal(),
            'total'         => Cart::getTotal()
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.product.view-cart');
    }

    public function addToCart (Request $request)
    {
        try {
            $this->product = Product::find($request->product_id, ['id','title', 'price', 'image' ]);
            Cart::add([
                'id' => $this->product->id,
                'name' => $this->product->title,
                'price' => $request->price,
                'quantity' => 1,
                'attributes' => [
                    'image' => $this->product->image,
                ]
            ]);
            return back()->with('success', 'Product added to cart successfully.');
        } catch (\Exception $exception)
        {
//            return back()->with('error',$exception->getMessage());
            return response()->json($exception->getMessage());
        }
    }

    public function removeFromCart ($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item removed from cart successfully.');
    }

    public function allBLogs ()
    {
        $this->blogCategories = BlogCategory::whereStatus(1)->orderBy('order', 'ASC')->select('id', 'name', 'parent_id', 'image', 'slug')->get();
        $this->blogs = Blog::whereStatus(1)->with(['blogCategory' => function($blogCategory){
            $blogCategory->select('id', 'name', 'slug')->get();
        }])->paginate(9);
        $this->data = [
            'blogCategories'    => $this->blogCategories,
            'blogs'             => $this->blogs,
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.blogs.blog');
    }

    public function categoryBlogs ($id, $slug = null)
    {
        $this->blogs = BlogCategory::whereSlug($slug)->first()->blogs()->paginate(9);
        $this->blogCategory = BlogCategory::whereSlug($slug)->select('id', 'parent_id', 'name', 'slug')->first();
        $this->data = [
            'blogs'    => $this->blogs,
            'blogCategory'  => $this->blogCategory
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.blogs.category-blogs');
    }

    public function blogDetails ($id, $slug = null)
    {
        $this->blog = Blog::find($id);
        $this->comments = ContactMessage::where(['status' => 1, 'type' => 'blog', 'parent_model_id' => $this->blog->id])->get();
        $this->data = [
            'blog'    => $this->blog,
            'recentBlogs'   => Blog::whereStatus(1)->latest()->take(6)->get(),
            'comments'      => $this->comments
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.blogs.blog-details');
    }

    public function allJobCirculars()
    {
        $this->jobCirculars = Circular::whereStatus(1)->latest()->select('id', 'slug', 'image', 'circular_category_id', 'user_id', 'job_title', 'created_at')->paginate(12);
        $this->data = [
            'circulars' => $this->jobCirculars,
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.job-circulars.circular');
    }

    public function jobCircularDetail($id, $slug = null)
    {
        $this->jobCircular  = Circular::find($id);
        $this->jobCirculars = Circular::whereStatus(1)->where('id', '!=', $id)->latest()->take(6)->select('id', 'post_title', 'image', 'slug', 'created_at')->get();
        $this->data = [
            'circular' => $this->jobCircular,
            'recentPosts' => $this->jobCirculars,
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.job-circulars.circular-detail');
    }

    public function newContact (Request $request)
    {

        if (auth()->check())
        {
            $request->validate([
                'name'  => 'required',
                'email'  => 'required',
                'mobile'  => ['required', 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
                'message'  => 'required',
            ]);
            try {
                ContactMessage::createOrUpdateContactMessage($request);
                return back()->with('success', 'Thanks for your message.');
            } catch (\Exception $exception)
            {
                return back()->with('error', $exception->getMessage());
            }
        }
        return back()->with('error', 'Please Login First.');
    }

    public function instructors ()
    {
        $this->teachers = Teacher::whereStatus(1)->select('id','user_id', 'first_name', 'last_name', 'image', 'subject', 'status', 'github', 'twitter', 'linkedin', 'whatsapp', 'facebook', 'website')->get();
        $this->data = [
            'teachers'  => $this->teachers
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.instructors.instructors');
    }

    public function newComment (Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);
        ContactMessage::createOrUpdateContactMessage($request);
        return back()->with('success', 'Comment submitted successfully.');
    }

    public function instructorDetails ($slug)
    {

    }
}
