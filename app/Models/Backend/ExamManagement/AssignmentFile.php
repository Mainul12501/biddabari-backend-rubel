<?php

namespace App\Models\Backend\ExamManagement;

use App\Models\Backend\Course\CourseSectionContent;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignmentFile extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'course_section_content_id',
        'file',
        'file_type',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'assignment_files';

    public function courseSectionContent()
    {
        return $this->belongsTo(CourseSectionContent::class);
    }
}
