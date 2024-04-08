<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use App\Policies\AdminPolicy;
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
        User::class => AdminPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $admin) {
            dd($admin);
            return $admin->isAdmin();
        });
        //defining gate for updating a job
        Gate::define('update-job', function (User $user, Post $job) {
            return $job->profile_id == $user->profile->id;
        });

        //defining gate for updating a job
        Gate::define('delete-job', function ($user, Post $job) {
            return $user->profile->id == $job->profiles_id;
        });

        Gate::define('edit-profile', function (User $user, Profile $profile) {

            return $profile->id == $user->profile->id;
        });
        // Gate::define('delete-profile', function ($user, $profile) {
        //      return $profile->id == $user->profile->id;
        // });
    }
}
