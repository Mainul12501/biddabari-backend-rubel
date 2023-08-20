<?php

namespace App\Models\Backend\RoleManagement;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'note', 'slug', 'is_default', 'status'];

    protected $searchableFields = ['*'];

    protected static $role;

    public static function saveData ($request)
    {
        self::$role = Role::create([
            'title' => $request->title,
            'note' => $request->note,
            'slug' => str_replace(' ','-', Str::lower($request->title)),
            'is_default'    => 0,
            'status'    => $request->status == 'on' ? 1 : 0,
        ]);
        self::$role->permissions()->sync($request->permissions);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
