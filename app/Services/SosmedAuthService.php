<?php

namespace App\Services;

use App\Traits\BaseResponse;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Laravel\Socialite\Facades\Socialite;
use App\Interface\SosmedAuthServiceInterface;

class SosmedAuthService implements SosmedAuthServiceInterface {
    use BaseResponse;
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function googleCallback(Request $request): array
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = $this->userRepository->findByEmail($googleUser->getEmail());

        if (!$user) {
            $user = $this->userRepository->createUser([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(uniqid())
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return $this->succesResponse(['token' => $token, 'user' => $user]);
    }
    
}