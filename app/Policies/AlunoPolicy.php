<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;

class AlunoPolicy
{
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'instrutor']);
    }

    public function update(User $user, Aluno $aluno): bool
    {
        return in_array($user->role, ['admin', 'instrutor']);
    }

    public function delete(User $user, Aluno $aluno): bool
    {
        return $user->role === 'admin';
    }
};