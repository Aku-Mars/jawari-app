<?php

namespace App\Policies;

use App\Models\Artikel;
use App\Models\User;

class ArtikelPolicy
{
    /**
     * Semua user yang login boleh melihat daftar artikel
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Semua user yang login boleh melihat artikel
     */
    public function view(User $user, Artikel $artikel): bool
    {
        return true;
    }

    /**
     * Semua user yang login boleh membuat artikel
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Hanya user yang memiliki artikel yang bisa mengedit
     */
    public function update(User $user, Artikel $artikel): bool
    {
        return $user->id === $artikel->user_id;
    }

    /**
     * Hanya user yang memiliki artikel yang bisa menghapus
     */
    public function delete(User $user, Artikel $artikel): bool
    {
        return $user->id === $artikel->user_id;
    }

    /**
     * Tidak mengizinkan restore
     */
    public function restore(User $user, Artikel $artikel): bool
    {
        return true;
    }

    /**
     * Tidak mengizinkan force delete
     */
    public function forceDelete(User $user, Artikel $artikel): bool
    {
        return true;
    }
}
