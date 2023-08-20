<?php

namespace App\Models\Backend\UserManagement;

use App\Models\Backend\Course\Course;
use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
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
        'subject',
        'last_education',
        'total_commission',
        'status',
        'github',
        'twitter',
        'linkedin',
        'whatsapp',
        'facebook',
        'website',
        'dob',
        'gender',
    ];

    protected $searchableFields = ['*'];

    protected static $student;

    public static function createOrUpdateTeacher ($request, $user = null, $id = null)
    {
        Teacher::updateOrCreate(['id' => $id], [
            'user_id'                   => $user->id,
            'first_name'                => $request->first_name,
            'last_name'                 => $request->last_name,
            'email'                     => $request->email,
            'mobile'                    => $request->mobile,
            'image'                     => imageUpload($request->file('image'), 'student-images/', 'student', '280', '350', (isset($id) ? static::find($id)->image : null)),
            'description'               => $request->description,
            'subject'                   => $request->subject,
            'present_address'           => $request->present_address,
            'permanent_address'         => $request->permanent_address,
            'last_education'            => $request->last_education,
            'github'                    => $request->github,
            'twitter'                   => $request->twitter,
            'linkedin'                  => $request->linkedin,
            'whatsapp'                  => $request->whatsapp,
            'facebook'                  => $request->facebook,
            'website'                   => $request->website,
            'dob'                       => $request->dob,
            'gender'                   => $request->gender,
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
}
