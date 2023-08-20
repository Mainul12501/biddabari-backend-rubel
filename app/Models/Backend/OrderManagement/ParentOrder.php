<?php

namespace App\Models\Backend\OrderManagement;

use App\Models\Backend\BatchExamManagement\BatchExam;
use App\Models\Backend\BatchExamManagement\BatchExamSubscription;
use App\Models\Backend\Course\Course;
use App\Models\Backend\ProductManagement\Product;
use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentOrder extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'parent_model_id',
        'checked_by',
        'batch_exam_subscription_id',
        'ordered_for',
        'order_invoice_number',
        'payment_method',
        'vendor',
        'paid_to',
        'paid_from',
        'txt_id',
        'paid_amount',
        'total_amount',
        'coupon_code',
        'coupon_amount',
        'status',
        'contact_status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'parent_orders';

    protected static $xmOrder;

    public static function storeXmOrderInfo($request, $id)
    {
        ParentOrder::updateOrCreate(['id' => $id], [
            'parent_model_id'           => $id,
            'user_id'                   => auth()->id(),
            'order_invoice_number'      => self::generateOrderNumber(),
            'ordered_for'               => $request->ordered_for,
            'payment_method'            => $request->payment_method,
            'vendor'                    => $request->vendor,
            'paid_to'                   => $request->paid_to,
            'paid_from'                 => $request->paid_from,
            'txt_id'                    => $request->txt_id,
//            'paid_amount'   => $request->paid_amount,
            'total_amount'              => $request->total_amount,
            'coupon_code'               => $request->coupon_code,
            'coupon_amount'             => $request->coupon_amount,
            'batch_exam_subscription_id' => isset($request->batch_exam_subscription_id) ?? null,
        ]);
    }

    public static function generateOrderNumber ()
    {
        $number = rand(100000, 999999);
        $existNumber = ParentOrder::where('order_invoice_number', $number)->first();
        if (!empty($existNumber) && count($existNumber) > 0)
        {
            self::generateOrderNumber();
        }
        return $number;
    }

    public static function updateExamOrderStatus($request, $id)
    {
        self::$xmOrder = ParentOrder::find($id);
//        self::$xmOrder->checked_by  = auth()->id();

//        if ($request->payment_status == 'complete')
//        {
//            self::$xmOrder->paid_amount  = self::$xmOrder->exam->price;
//        } else {
//            self::$xmOrder->paid_amount  = !empty($request->paid_amount) ? $request->paid_amount : self::$xmOrder->paid_amount;
//        }

        self::$xmOrder->paid_amount  = $request->paid_amount;
        self::$xmOrder->payment_status  = $request->payment_status;
//        self::$xmOrder->contact_status  = $request->contact_status;
        self::$xmOrder->status  = $request->status;
        self::$xmOrder->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'parent_model_id');
    }

    public function batchExam()
    {
        return $this->belongsTo(BatchExam::class, 'parent_model_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'parent_model_id');
    }

    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function batchExamSubscription()
    {
        return $this->belongsTo(BatchExamSubscription::class);
    }
}
