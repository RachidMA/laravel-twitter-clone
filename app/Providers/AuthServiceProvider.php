<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Profile;
use App\Policies\ProfilePolicy;
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
        Profile::class => ProfilePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();


        //defining gate for updating a job
        Gate::define('update-job', function ($user, $job) {
            return $job->profile_id == $user->profile->id;
        });

        //defining gate for updating a job
        Gate::define('delete-job', function ($user, $job) {
            return $user->profile->id == $job->profiles_id;
        });

        Gate::define('edit-profile', function ($user, $profile) {

            return $profile->id == $user->profile->id;
        });
        // Gate::define('delete-profile', function ($user, $profile) {
        //      return $profile->id == $user->profile->id;
        // });
    }
}
