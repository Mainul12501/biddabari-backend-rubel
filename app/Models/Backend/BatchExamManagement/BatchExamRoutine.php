<?php

namespace App\Models\Backend\BatchExamManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatchExamRoutine extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'batch_exam_id',
        'day',
        'date_time',
        'date_time_timestamp',
        'room',
        'note',
        'status',
        'is_fack',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'batch_exam_routines';

    public static function createOrUpdateCourseRoutines ($request, $id = null)
    {
        BatchExamRoutine::updateOrCreate(['id' => $id], [
            'batch_exam_id'         => $request->batch_exam_id,
            'day'                   => $request->day,
            'date_time'             => $request->date_time,
            'date_time_timestamp'   => strtotime($request->date_time),
            'room'                  => $request->room,
            'note'                  => $request->note,
            'status'                => $request->status == 'on' ? 1 : 0,
            'is_fack'                => $request->is_fack == 'on' ? 1 : 0,
        ]);
    }

    public function batchExam()
    {
        return $this->belongsTo(BatchExam::class);
    }
}
