<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\PasswordResetService;

use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{

    public function sendResetLinkEmail(ForgotPasswordRequest $request, PasswordResetService $service)
    {
        return $service->sendResetLink($request->email);
    }

    public function reset(ResetPasswordRequest $request)
    {

        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => bcrypt($request->password)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['message' => __('Your password has been reset!')], 200);
        }

        return response()->json(['message' => __($status)], 400);
    }
}
