<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(10);
//        $posts = Post::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(10);
        return view('categories.show', compact('category', 'posts'));
    }
}
