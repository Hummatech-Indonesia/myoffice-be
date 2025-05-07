<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\CredentialService;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $service;

    public function __construct(CredentialService $service) {
        $this->service = $service;
    }

    public function register(RegisterRequest $request) {
        return response()->json($this->service->register($request));
    }

    public function login(LoginRequest $request) {
        return response()->json($this->service->login($request));
    }
}
