<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $image = "";
        if ($request->file('image')) {
            $image = $request->file('image');
            $image->storeAs('/avatars', $image->hashName(), 'public');
        }
        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $image != "" ? $image->hashName() : null,
        ]);
        return redirect()->route('users.index')->with('success', 'کاربر با موفیقت ایجاد شد');
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
        $user = User::query()->findOrFail($id);
        return view('admin.users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $image = "";
        if ($request->file('image')) {
            $image = $request->file('image');
            $image->storeAs('/avatars', $image->hashName(), 'public');
        }
        $user = User::query()->findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'image' => $request->image ? $image->hashName() : $user->image,
        ]);
        return redirect()->route('users.index')->with('success','کاربر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::query()->findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'فیلد انتخابی به سلطح زباله انتقال یافت');
    }

    public function trashed()
    {
        $trashedUsers = User::query()->onlyTrashed()->paginate(10);
        return view('admin.users.trashedList', compact('trashedUsers'));
    }

    public function restore($id)
    {
        User::query()->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('users.trashed')->with('success', 'فیلد انتخابی بازنشانی شد');
    }

    public function forceDelete($id)
    {
        User::query()->onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('users.trashed')->with('success', 'فیلد انتخابی با موفقیت حذف شد');
    }

    public function CreateUserRole($id)
    {
        $roles = Role::query()->get();
        $user = User::query()->findOrFail($id);
        return view('admin.users.role_user', compact('roles', 'user'));
    }

    public function StoreUserRole(Request $request,$id)
    {
        $user = User::query()->findOrFail($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index')->with('success','نقش به کاربر واگذار شد');
    }
}
