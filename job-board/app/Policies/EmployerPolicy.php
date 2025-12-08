<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;

class EmployerPolicy
{
    public function viewAny(User $user): bool
    {
        return false; // prevent 403 from global checks
    }

    public function view(User $user, Employer $employer): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return null === $user->employer;
    }

    public function update(User $user, Employer $employer): bool
    {
        return $employer->user_id === $user->id;
    }

    public function delete(User $user, Employer $employer): bool
    {
        return false;
    }
}
