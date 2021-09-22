<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use function React\Promise\all;

class MainController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }
}
