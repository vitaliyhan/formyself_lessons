<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'search' => 'required'
        ]);
        $search = $request->search;
        $posts = Post::like($search, ['title', 'description', 'content'])->with('category')->paginate(10);

        return view('posts.search', compact('posts', 'search'));

    }
}
