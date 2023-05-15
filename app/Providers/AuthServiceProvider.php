<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Automobiliai;
use App\Models\Savininkai;
use App\Models\User;
use App\Policies\SavininkaiPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Savininkai::class=>SavininkaiPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('filter', function (User $user){
            return $user->can_filter===1;
        });

        Gate::define('edit', function (User $user, Savininkai $savininkais){
            return $user->can_edit_old===1 || $user->can_edit_old===0;
        });
    }
}
