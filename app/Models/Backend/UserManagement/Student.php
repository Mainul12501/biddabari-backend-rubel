<?php

namespace App\Models\Backend\UserManagement;

use App\Models\Backend\BatchExamManagement\BatchExam;
use App\Models\Backend\Course\Course;
use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'image',
        'description',
        'present_address',
        'permanent_address',
        'last_education',
        'status',
        'gender',
        'dob',
        'school',
        'college',
        'university',
        'github',
        'twitter',
        'linkedin',
        'whatsapp',
        'facebook',
        'website',
        'institute_name',
    ];

    protected $searchableFields = ['*'];

    protected static $student;

    public static function createOrUpdateStudent ($request, $user = null, $id = null)
    {
        Student::updateOrCreate(['id' => $id], [
            'user_id'                   => $user->id,
            'first_name'                => $request->first_name,
            'last_name'                 => $request->last_name,
            'email'                     => $request->email,
            'mobile'                    => $request->mobile,
            'image'                     => imageUpload($request->file('image'), 'student-images/', 'student', '280', '350', (isset($id) ? Student::find($id)->image : null)),
            'description'               => $request->description,
            'present_address'           => $request->present_address,
            'permanent_address'         => $request->permanent_address,
            'last_education'            => $request->last_education,
            'github'                    => $request->github,
            'gender'                    => $request->gender,
            'dob'                       => $request->dob,
            'school'                    => $request->school,
            'college'                   => $request->college,
            'university'                => $request->university,
            'twitter'                   => $request->twitter,
            'linkedin'                  => $request->linkedin,
            'whatsapp'                  => $request->whatsapp,
            'facebook'                  => $request->facebook,
            'website'                   => $request->website,
            'institute_name'            => $request->institute_name,
//            'status'                    => $request->status,
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function batchExams()
    {
        return $this->belongsToMany(BatchExam::class);
    }
}
