<?php

namespace App\Models\Backend\BatchExamManagement;

use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatchExamSubscription extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'batch_exam_id',
        'price',
        'package_duration_in_days',
        'discount_type',
        'discount_start_date',
        'discount_start_date_timestamp',
        'discount_end_date_timestamp',
        'discount_end_date',
        'status',
        'package_title',
        'discount_amount'
    ];

    protected $searchableFields = ['*'];

    protected $table = 'batch_exam_subscriptions';

    public static function createOrUpdateSubscription($request, $batchExamId)
    {
        foreach ($request->price as $key => $singlePrice)
        {
            static::create([
                'batch_exam_id' => $batchExamId,
                'price' => $singlePrice,
                'package_title'  => $request->package_title[$key],
                'package_duration_in_days'  => $request->package_duration_in_days[$key],
                'discount_type' => $request->discount_type[$key],
                'discount_amount' => $request->discount_amount[$key],
                'discount_start_date'   => $request->discount_start_date[$key],
                'discount_start_date_timestamp' => strtotime($request->discount_start_date[$key]),
                'discount_end_date_timestamp'   => strtotime($request->discount_end_date[$key]),
                'discount_end_date' => $request->discount_end_date[$key],
                'status'    => 1,
            ]);
        }
    }

    public function batchExam()
    {
        return $this->belongsTo(BatchExam::class);
    }

    public function parentOrders()
    {
        return $this->hasMany(ParentOrder::class);
    }
}
