<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::active()->with('user')
            ->when(request('category'), function($query) {
                return $query->whereHas('categories', function($q) {
                    $q->where('slug', request()->category);
                });
            })
            ->when(request('tag'), function($query) {
                return $query->whereHas('tags', function($q) {
                    $q->where('slug', request()->tag);
                });
            })
            ->search(request()->key)
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('home')->with('articles', $articles);
    }
}
