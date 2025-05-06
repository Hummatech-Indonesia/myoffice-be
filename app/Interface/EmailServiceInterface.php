<?php

namespace App\Interface;

use Illuminate\Support\Facades\Request;

interface EmailServiceInterface {

    public function sendVerification(Request $request);

    public function verifyEmail(Request $request, $id, $hash);

}