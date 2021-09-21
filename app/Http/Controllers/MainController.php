<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use function React\Promise\all;

class MainController extends Controller
{
    public function index()
    {
        $tag = new Tag();
        $tag->title = 'Привет';
        $tag->save();
        dd(Tag::all());
        return view('admin.index');
    }
}
