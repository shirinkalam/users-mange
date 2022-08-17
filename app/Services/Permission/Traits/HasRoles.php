<?php
namespace App\Services\Permission\Traits ;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Arr;

trait HasRoles
{


        #Relation
        public function roles()
        {
            return $this->belongsToMany(Role::class);
        }

        #get roles from Role model
        protected function getAllRoles(array $roles)
        {
            return Role::whereIn('name',Arr::flatten($roles))->get();
        }


        #Assign Roles to User
        public function giveRolesTo(...$roles)
        {
            $roles = $this->getAllRoles($roles);

            if($roles->isEmpty()) return $this;

            $this->roles()->syncWithoutDetaching($roles);

            return $this ;
        }

        #Withdraw roles from the user
        public function withdrawRoles(...$roles)
        {
            $roles = $this->getAllRoles($roles);

            $this->roles()->detach($roles);

            return $this;
        }

        #reset roles and add new role
        public function refreshRoles(...$roles)
        {
            $roles = $this->getAllRoles($roles);

            $this->roles()->sync($roles);

            return $this;
        }

        #Checking the user has that roles or not
        public function hasRole(Role $role)
        {
            #Checking whether there is role in the name column or not
            return $this->roles->contains($role);
        }
}
