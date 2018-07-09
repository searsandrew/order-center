<?php

namespace App\Providers;

use App\Post;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPostPolicies();
    }

    public function registerPostPolicies()
    {
        Gate::define('create-order', function ($user) {
            return $user->hasAccess(['create-order']);
        });
        Gate::define('update-order', function ($user, Order $order) {
            return $user->hasAccess(['update-order']) or $user->id == $order->user_id;
        });
        Gate::define('complete-order', function ($user) {
            return $user->hasAccess(['complete-order']);
        });
        Gate::define('see-all-orders', function ($user) {
            return $user->inRole('employee');
        });
    }
}
