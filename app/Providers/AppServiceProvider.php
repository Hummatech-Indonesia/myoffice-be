<?php

namespace App\Providers;

use App\Services\EmailService;
use App\Services\CredentialService;
use App\Services\SosmedAuthService;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

use App\Interface\EmailServiceInterface;
use App\Interface\UserRepositoryInterface;
use App\Interface\CredentialServiceInterface;
use App\Interface\SosmedAuthServiceInterface;

use App\Interface\EmailServiceInterface;
use App\Interface\UserRepositoryInterface;
use App\Interface\CredentialServiceInterface;
use App\interface\PasswordResetInterface;
use App\Interface\SosmedAuthServiceInterface;
use App\Services\PasswordResetService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CredentialServiceInterface::class, CredentialService::class);
        $this->app->bind(SosmedAuthServiceInterface::class, SosmedAuthService::class);
        $this->app->bind(EmailServiceInterface::class, EmailService::class);
        $this->app->bind(PasswordResetInterface::class, PasswordResetService::class);
        $this->app->bind(
            PasswordResetInterface::class,
            \App\Repositories\PasswordResetRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
