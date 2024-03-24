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
    public function create()
    {
        // dd('sddsd');
        return Inertia::render('Dashboard/Role/Create')->with([

        ]);

    }
    public function store(Request $request)
    {
        // dd($request->all());

        $req = $request->validate([
            'name' => ['required']
        ]);
        Role::create([
            'name'=>$req['name']
        ]);
        return redirect()->route('dashboard.roles.index');


    }
    public function destroy(Role $role,)
    {
        // dd($request->all());

// dd($role);
      $role->delete();
      return redirect()->route('dashboard.roles.index')->with('success', 'role deleted successfuly.');


    }
    // public function store(Request $request)
    // {
    //     // dd($request->all());

    //     $req = $request->only('name');
    //     Role::create([
    //         'name'=>$req['name']
    //     ]);
    //     return redirect()->route('dashboard.roles.index');


    // }
}
