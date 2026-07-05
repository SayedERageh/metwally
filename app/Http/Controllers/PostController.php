<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;
class PostController 
{
public function index(Request $request)
{
    $categories = Category::all();

    $posts = Post::query();

    // فلترة حسب الكاتيجوري لو موجود
    if ($request->filled('category')) {
        $posts->where('category_id', $request->category);
    }

    $posts = $posts->latest()->get();

    return view('posts.index', compact('posts', 'categories'));
}

public function show($slug)
{
    $post = Post::with(['paragraphs', 'category'])->where('slug', $slug)->firstOrFail();

    $recentPosts = Post::latest()->take(5)->get();

    $categories = Category::withCount('posts')->get();

    $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->take(3)
        ->get();

    return view('posts.show', compact(
        'post',
        'recentPosts',
        'categories',
        'relatedPosts'
    ));
}

}