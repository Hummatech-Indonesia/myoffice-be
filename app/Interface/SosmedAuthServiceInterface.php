<?php

namespace App\Interface;

use Illuminate\Http\Request;


interface SosmedAuthServiceInterface {

    public function googleCallback(Request $request);

}