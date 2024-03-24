<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Role;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return Inertia::render('Dashboard/Role/Index')->with([
            'roles' => $roles
        ]);
    }

    public function edit(Role $role)
    {
        return Inertia::render('Dashboard/Role/Edit')->with([
            'role' => $role
        ]);
    }
    public function update(Role $role, Request $request)
    {
        $req = $request->only('name');
        $role->name = $req['name'];
        $role->save();
        return redirect()->route('dashboard.roles.index');
    }
}
