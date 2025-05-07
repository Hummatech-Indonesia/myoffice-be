<?php

namespace App\Services;

use App\interface\PasswordResetInterface;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class PasswordResetService
{
    protected PasswordResetInterface $repo;

    public function __construct(PasswordResetInterface $repo)
    {
        $this->repo = $repo;
    }

    public function sendResetLink(string $email)
    {
        $status = $this->repo->sendResetLink($email);
        return response()->json(['message' => __($status)], $status === Password::RESET_LINK_SENT ? 200 : 400);
    }

    public function resetPassword(array $data)
    {
        $status = $this->repo->resetPassword($data);
        return response()->json(['message' => __($status)], $status === Password::PASSWORD_RESET ? 200 : 400);
    }
}
