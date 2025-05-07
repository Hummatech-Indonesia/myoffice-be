<?php

namespace App\interface;

interface PasswordResetInterface
{
    public function sendResetLink(string $email): string;
    public function resetPassword(array $data): string;
}
