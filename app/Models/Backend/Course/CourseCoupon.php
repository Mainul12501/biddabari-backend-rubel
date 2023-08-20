<?php

namespace App\Models\Backend\Course;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCoupon extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'course_id',
        'code',
        'type',
        'percentage_value',
        'discount_amount',
        'flat_discount',
        'note',
        'expire_date_time',
        'expire_date_time_timestamp',
        'available_from',
        'avaliable_from_timestamp',
        'avaliable_to',
        'avaliable_to_timestamp',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'course_coupons';

    protected static $courseCoupon;

    public static function createOrUpdateCourseCoupons ($request, $id = null)
    {
        CourseCoupon::updateOrCreate(['id' => $id], [
            'course_id'                         => $request->course_id,
            'code'                              => $request->code,
            'type'                              => $request->type,
            'percentage_value'                  => $request->percentage_value,
            'discount_amount'                   => $request->type == 'Flat' ? $request->discount_amount : (Course::find($request->course_id)->price * $request->percentage_value)/100,
            'flat_discount'                     => $request->flat_discount,
            'note'                              => $request->note,
            'expire_date_time'                  => $request->expire_date_time,
            'expire_date_time_timestamp'        => strtotime($request->expire_date_time),
            'available_from'                    => $request->available_from,
            'avaliable_from_timestamp'          => strtotime($request->available_from),
            'avaliable_to'                      => $request->avaliable_to,
            'avaliable_to_timestamp'            => strtotime($request->avaliable_to),
            'status'                            => 1,
        ]);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
