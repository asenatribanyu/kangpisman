<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Article_View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
     public function show(Article $article)
    {
        $ip = request()->ip();
    if (!$article->hasViewed($ip)) {
        $article->recordView($ip);
    }
    $categories = $article->categories->pluck('category_name');

    $related_articles = Article::whereHas('categories', function ($query) use ($categories) {
    $query->whereIn('category_name', $categories);
    })->where('id', '<>', $article->id)->take(5)->get();

    if ($related_articles->isEmpty()) {
    $related_articles = Article::inRandomOrder()
        ->where('id', '<>', $article->id)

        ->take(5)
        ->get();
    }
    $random_articles = Article::inRandomOrder()
    ->where('id', '<>', $article->id)
    ->take(5)
    ->get();
    $title = $article->title;
        return view('article/preview', [
            "title" => "| $title ",
            'articles'=> $article,
            'related_articles'=>$related_articles,
            'random_articles'=>$random_articles,
        ]);
    }
    
}
