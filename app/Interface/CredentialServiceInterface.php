<?php

namespace App\Interface;

use Illuminate\Http\Request;

interface CredentialServiceInterface {

    public function register(Request $request);

    public function login(Request $request);

}