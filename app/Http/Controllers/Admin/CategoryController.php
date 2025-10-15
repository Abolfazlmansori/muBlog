<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->orderBy('categories.created_at','DESC')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::query()->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index')->with('success', 'دسته بندی با موفقیت ساخته شد');
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
        $category = Category::query()->findOrFail($id);
        $categories = Category::query()->pluck('name', 'id');
        return view('admin.categories.update', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $categories = Category::query()->findOrFail($id);
        $categories->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('categories.index')->with('success','دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::query()->findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('success','دسته بندی با موفقیت به سطل زباله انتقال یافت ');
    }

    public function trashed()
    {
        $trashedCategories = Category::query()->onlyTrashed()->paginate(10);
        return view('admin.categories.trashedList',compact('trashedCategories'));
    }

    public function restore($id)
    {
        Category::query()->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('categories.trashed')->with('success', 'فیلد انتخابی بازنشانی شد');
    }
    public function forceDelete($id)
    {
        Category::query()->onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('categories.trashed')->with('success', 'فیلد انتخابی با موفقیت حذف شد');
    }
}
