<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CrateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::query()->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrateRoleRequest $request)
    {
        Role::query()->create([
            'name' => $request->name,
        ]);
        return redirect()->route('roles.index')->with('success', 'نقش با موفیقت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::query()->findOrFail($id);
        return view('admin.roles.update', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {
        Role::query()->findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('roles.index')->with('success','نقش با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::query()->findOrFail($id)->delete();
        return redirect()->route('roles.index')->with('success', 'فیلد انتخابی به سلطح زباله انتقال یافت');
    }

    public function trashed()
    {
        $trashedRoles = Role::query()->onlyTrashed()->paginate(10);
        return view('admin.roles.trashedList', compact('trashedRoles'));
    }

    public function restore($id)
    {
        Role::query()->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('roles.trashed')->with('success', 'فیلد انتخابی بازنشانی شد');
    }

    public function forceDelete($id)
    {
        Role::query()->onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('roles.trashed')->with('success','فیلد انتخابی با موفقیت حذف شد');
    }

}
