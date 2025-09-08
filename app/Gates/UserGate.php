<?php

namespace App\Gates;

use App\Models\User;

class UserGate
{
    /**
     * Check if the user is an admin.
     *
     * @param User|null $user
     * @return bool
     */
    public static function isAdmin(?User $user): bool
    {
        // Safely check for null, and that the User model has the method.
        return $user && method_exists($user, 'isAdmin') && $user->isAdmin();
    }

    /**
     * Example: check if the user is a client (customize or add other roles as needed).
     *
     * @param User|null $user
     * @return bool
     */
    public static function isClient(?User $user): bool
    {
        return $user && method_exists($user, 'isClient') && $user->isClient();
    }
}
