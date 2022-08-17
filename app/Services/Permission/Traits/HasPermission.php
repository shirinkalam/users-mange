<?php
namespace App\Services\Permission\Traits ;

use App\Models\Permission;
use Illuminate\Support\Arr;

trait HasPermission
{
    #Relation
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    #get permission from Permission model
    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('name',Arr::flatten($permissions))->get();
    }


    #Assign Permission to User
    public function givePermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);

        if($permissions->isEmpty()) return $this;

        $this->permissions()->syncWithoutDetaching($permissions);

        return $this ;
    }

    #Withdraw Permission from the user
    public function withdrawPermissions(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);

        $this->permissions()->detach($permissions);

        return $this;
    }

    #reset Permissions and add new permission
    public function refreshPemissions(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);

        $this->permissions()->sync($permissions);

        return $this;
    }

    #Checking the user has that permissions or not
    public function hasPermission(Permission $permission)
    {
        #Checking whether there is permission in the name column or not
        return $this->permissions->contains($permission);
    }
}
