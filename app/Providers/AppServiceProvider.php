<?php

namespace App\Providers;

use App\Models\Fish;
use App\Models\Fisherman;
use App\Models\Fishery;
use App\Models\Haul;
use App\Models\User;
use App\Policies\FishermanPolicy;
use App\Policies\FisheryPolicy;
use App\Policies\FishPolicy;
use App\Policies\HaulPolicy;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        {
            $this->app->afterResolving(EncryptCookies::class, function ($middleware) {
                $middleware->disableFor('laravel_session');
                $middleware->disableFor('XSRF-TOKEN');
            });
        }

        Gate::define('is-admin', function (User $user) {
            return $user->isAdmin();
        });

        Gate::policy(Haul::class, HaulPolicy::class);
        Gate::policy(Fish::class, FishPolicy::class);
        Gate::policy(Fishery::class, FisheryPolicy::class);
        Gate::policy(Fisherman::class, FishermanPolicy::class);
    }
}
