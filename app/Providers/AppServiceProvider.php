<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< Updated upstream
=======
use App\Interface\EmailServiceInterface;
use App\Interface\UserRepositoryInterface;
use App\Interface\CredentialServiceInterface;
use App\interface\PasswordResetInterface;
use App\Interface\SosmedAuthServiceInterface;
use App\Services\PasswordResetService;
>>>>>>> Stashed changes

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
<<<<<<< Updated upstream
        //
=======
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CredentialServiceInterface::class, CredentialService::class);
        $this->app->bind(SosmedAuthServiceInterface::class, SosmedAuthService::class);
        $this->app->bind(EmailServiceInterface::class, EmailService::class);
        $this->app->bind(PasswordResetInterface::class, PasswordResetService::class);
        $this->app->bind(PasswordResetInterface::class,\App\Repositories\PasswordResetRepository::class
        );
>>>>>>> Stashed changes
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void 
    {
        
    }
}
