<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use App\Interface\EmailServiceInterface;

class EmailService implements EmailServiceInterface
{
    public function sendVerification(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.']);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => 'Verification link sent.']);
    }

    public function verifyEmail(Request $request, $id, $hash)
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.']);
        }

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['message' => 'Invalid verification link.'], 403);
        }

        if ($user->markEmailAsVerified()) {

        return response()->json(['message' => 'Email successfully verified.']);
    }
}

            event(new Verified($user));
        }