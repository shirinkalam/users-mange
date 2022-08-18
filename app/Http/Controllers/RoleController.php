<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.list',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        Role::create($request->only('name','persian_name'));

        return back()->with('success');
    }

    protected function validateForm($request)
    {
        return $request->validate([
            'name'=>['required'],
            'persian_name'=>['required'],
        ]);
    }
}
