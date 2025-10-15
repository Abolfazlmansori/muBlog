<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\CreateArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::query()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id');
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request)
    {
            $image = $request->file('image');
            $image->storeAs('/articles', $image->hashName(),'public');
        Article::query()->create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'body' => $request->body,
            'image' => $image->hashName(),
        ]);
        return redirect()->route('articles.index')->with('success','مقاله با موفقیت ایجاد شد');
    }

    public function ckeditorImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $imageName = $request->upload->hashName();
            $request->upload->storeAs($imageName);
        }
        $url = url('images/articles/'.$imageName);
        return response()->json(['url' => $url]);
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
        $article = Article::query()->findOrFail($id);
        $categories = Category::getCategory();
        return view('admin.articles.update', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $article = Article::query()->findOrFail($id);
        if (isset($request->image)) {
            $image = $request->file('image');
            $image->storeAs('/articles', $image->hashName(),'public');
        }
        Article::query()->findOrFail($id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'image' => $request->image ? $image->hashName() : $article->image,
        ]);

        return redirect()->route('articles.index')->with('success', 'مقاله با موفقیت بروزرسانی شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::query()->findOrFail($id)->delete();
        return redirect()->route('articles.index')->with('مقاله با موفقیت به سطل زباله انتقال یافت');
    }

    public function trashed()
    {
        $articles = Article::query()->onlyTrashed()->paginate(10);
        return view('admin.articles.trashedList', compact('articles'));
    }

    public function restore($id)
    {
        Article::query()->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('articles.trashed')->with('success', 'فیلد انتخابی بازنشانی شد');
    }

    public function forceDelete($id)
    {
        Article::query()->withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('articles.trashed')->with('success', 'فیلد انتخابی با موفقیت حذف شد');

    }
}
