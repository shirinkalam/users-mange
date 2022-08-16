<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Auth\Access\Gate;
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
    }
}
