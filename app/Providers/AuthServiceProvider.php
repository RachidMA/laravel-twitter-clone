<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        //defining gate for updating a job
        Gate::define('update-job', function ($job) {
            return Auth::user()->profile->id == $job->profiles_id;
        });

        //defining gate for updating a job
        Gate::define('delete-job', function ($job) {
            return Auth::user()->profile->id == $job->profiles_id;
        });

        Gate::define('edit-profile', function ($profile) {
            return $profile->id == Auth::user()->profile->id;
        });
        // Gate::define('delete-profile', function ($profile) {
        //     return $profile->id == Auth::user()->profile->id;
        // });
    }
}
