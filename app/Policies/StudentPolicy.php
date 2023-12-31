<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\UserManagement\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the student can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the student can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\UserManagement\Student  $model
     * @return mixed
     */
    public function view(User $user, Student $model)
    {
        return true;
    }

    /**
     * Determine whether the student can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the student can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\UserManagement\Student  $model
     * @return mixed
     */
    public function update(User $user, Student $model)
    {
        return true;
    }

    /**
     * Determine whether the student can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\UserManagement\Student  $model
     * @return mixed
     */
    public function delete(User $user, Student $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\UserManagement\Student  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the student can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\UserManagement\Student  $model
     * @return mixed
     */
    public function restore(User $user, Student $model)
    {
        return false;
    }

    /**
     * Determine whether the student can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\UserManagement\Student  $model
     * @return mixed
     */
    public function forceDelete(User $user, Student $model)
    {
        return false;
    }
}
