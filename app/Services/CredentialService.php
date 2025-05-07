<?php

namespace App\Services;

use App\Traits\BaseResponse;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Interface\CredentialServiceInterface;

class CredentialService implements CredentialServiceInterface {
    use BaseResponse;
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request) {
        $user = $this->userRepository->createUser([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // $token = $user->createToken('api-token')->plainTextToken;

        $user->sendEmailVerificationNotification();

        return $this->succesResponse(["pesan" => 'Register Berhasil, Silahkan verifikasi email', "user" => $user]);
    }

    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->errorResponse('Invalid credentials', 401);
        }

        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return $this->succesResponse(['token' => $token, 'user' => $user]);
    }
}