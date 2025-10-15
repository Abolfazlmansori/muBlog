<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $last_articles = Article::query()->orderBy('created_at', 'desc')->take(5)->get();
        $last_updated_articles = Article::query()->orderBy('updated_at', 'desc')->take(5)->get();
        return view('Front.index', compact('last_articles', 'last_updated_articles'));
    }
}
