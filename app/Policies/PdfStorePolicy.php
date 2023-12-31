<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\PdfManagement\PdfStore;
use Illuminate\Auth\Access\HandlesAuthorization;

class PdfStorePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pdfStore can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the pdfStore can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\PdfManagement\PdfStore  $model
     * @return mixed
     */
    public function view(User $user, PdfStore $model)
    {
        return true;
    }

    /**
     * Determine whether the pdfStore can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the pdfStore can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\PdfManagement\PdfStore  $model
     * @return mixed
     */
    public function update(User $user, PdfStore $model)
    {
        return true;
    }

    /**
     * Determine whether the pdfStore can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\PdfManagement\PdfStore  $model
     * @return mixed
     */
    public function delete(User $user, PdfStore $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\PdfManagement\PdfStore  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the pdfStore can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\PdfManagement\PdfStore  $model
     * @return mixed
     */
    public function restore(User $user, PdfStore $model)
    {
        return false;
    }

    /**
     * Determine whether the pdfStore can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\PdfManagement\PdfStore  $model
     * @return mixed
     */
    public function forceDelete(User $user, PdfStore $model)
    {
        return false;
    }
}
