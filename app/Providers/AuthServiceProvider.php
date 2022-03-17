<?php

namespace App\Providers;

use App\Models\Petugas;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (Petugas $petugas) {
            return $petugas->level === 'admin';
        });
        Gate::define('petugas', function (Petugas $petugas) {
            return $petugas->level === 'petugas';
        });
    }
}
