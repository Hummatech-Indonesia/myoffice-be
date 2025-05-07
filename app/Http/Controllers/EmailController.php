<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\EmailServiceInterface;

class EmailController extends Controller
{
    protected $emailService;

    public function __construct(EmailServiceInterface $emailService)
    {
        $this->emailService = $emailService;
    }

    public function send(Request $request)
    {
        return $this->emailService->sendVerification($request);
    }

    public function verify(Request $request, $id, $hash)
    {
        return $this->emailService->verifyEmail($request, $id, $hash);
    }
}
