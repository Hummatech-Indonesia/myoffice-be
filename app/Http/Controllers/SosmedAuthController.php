<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SosmedAuthService;
use Laravel\Socialite\Facades\Socialite;

class SosmedAuthController extends Controller
{
    protected $service;

    public function __construct(SosmedAuthService $service) {
        $this->service = $service;
    }

    public function googleCallback(Request $request) {
        return response()->json($this->service->googleCallback($request));
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->stateless()->redirect();
    }

    
}
