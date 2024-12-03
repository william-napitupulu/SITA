<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Add your policy mappings here
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define gate for isStudent
        Gate::define('isStudent', function (User $user) {
            return $user->role === 'student';
        });

        // Define gate for isLecturer
        Gate::define('isLecturer', function (User $user) {
            return $user->role === 'lecturer';
        });

        // Define gate for isCoordinator
        Gate::define('isCoordinator', function (User $user) {
            return $user->role === 'coordinator';
        });

        // Define a gate for multiple roles: Lecturer or Coordinator
        Gate::define('isLecturerOrCoordinator', function (User $user) {
            return in_array($user->role, ['lecturer', 'coordinator']);
        });
    }
}
