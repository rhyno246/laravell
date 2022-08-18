<?php
namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess 
{
    public function setGateAndPolicyAccess () {
        $this->defineGateCategory();
    }
    public function defineGateCategory () {
        Gate::define('gate-category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('gate-category-create', 'App\Policies\CategoryPolicy@create');
    }
    
}