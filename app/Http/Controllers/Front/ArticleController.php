<?php

namespace App\Http\Controllers\Front;

use App\Enums\CommendStatus;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles(Category $category)
    {
        $articlesByCategory = Article::query()->where('category_id',$category->id)->latest()->paginate(1);
        return view('Front.articles',compact('articlesByCategory'));
    }

    public function article(Article $article)
    {
        $article->load(['comments'=>function($query){
            $query->where('status',CommendStatus::Approved->value);
        },'user','category']);

        $last_Articles = Article::query()->latest()->limit(3)->get();
        $categories = Category::query()->where('parent_id','!=',0)->get();
        return view('Front.single-article',compact('article','categories','last_Articles'));
    }
}
