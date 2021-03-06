<?php

namespace App\Policies;

use App\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user, Project $project) {
        return auth()->user()->isAdmin();
    }

    public function update(User $user, Project $project) {
        return auth()->user()->isAdmin();
    }
}
