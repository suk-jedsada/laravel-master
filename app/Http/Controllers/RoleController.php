<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Role;
use Inertia\Inertia;
use App\Http\Transformers\RoleTransformer;

class RoleController extends Controller
{
        public function index()
    {
        $roles = Role::all();
        $roleData = fractal($roles, new RoleTransformer())->toArray()['data'];
        // dd($roleData);
        return Inertia::render('Dashboard/Role/Index')->with([
            'roles' => $roleData
        ]);
    }

    public function edit(Role $role)
    {
            $roleData = fractal($role, new RoleTransformer())->toArray();
            return Inertia::render('Dashboard/Role/Edit')->with([
                'role' => $roleData
            ]);
    }

    public function update(Role $role, Request $request)
    {
        $req = $request->validate([
            'name' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);
        $role->name = $req['name'];
        $role->save();
        if (isset($req['image']) && $req['image'] != null) {
            $this->handleUploadImage($req['image'], $role);
        }
        return redirect()->route('dashboard.roles.index');
    }

    private function handleUploadImage($image, Role $role)
    {
        $role->addMedia($image)->toMediaCollection(Role::MEDIA_COLLECTION_IMAGE);
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
