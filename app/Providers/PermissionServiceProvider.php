<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Permission::all()->map(function($permission){
            FacadesGate::define($permission->name , function($user) use($permission){
                return $user->hasPermission($permission);
            });
        });

        Blade::if('admin', function ($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });
    }
}
