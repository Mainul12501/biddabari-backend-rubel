<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\BatchExamManagement\BatchExamSection;
use Illuminate\Auth\Access\HandlesAuthorization;

class BatchExamSectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the batchExamSection can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the batchExamSection can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BatchExamSection  $model
     * @return mixed
     */
    public function view(User $user, BatchExamSection $model)
    {
        return true;
    }

    /**
     * Determine whether the batchExamSection can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the batchExamSection can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BatchExamSection  $model
     * @return mixed
     */
    public function update(User $user, BatchExamSection $model)
    {
        return true;
    }

    /**
     * Determine whether the batchExamSection can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BatchExamSection  $model
     * @return mixed
     */
    public function delete(User $user, BatchExamSection $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BatchExamSection  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the batchExamSection can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BatchExamSection  $model
     * @return mixed
     */
    public function restore(User $user, BatchExamSection $model)
    {
        return false;
    }

    /**
     * Determine whether the batchExamSection can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BatchExamSection  $model
     * @return mixed
     */
    public function forceDelete(User $user, BatchExamSection $model)
    {
        return false;
    }
}
