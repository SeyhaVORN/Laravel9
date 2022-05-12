<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }
    public function create()
    {
        $category = Category::where('status', 0)->get();
        return view('admin.posts.create', compact('category'));
    }

    public function store(PostFormRequest $request)
    {
        Post::create($request->validated());
        return redirect()
            ->route('posts.create')
            ->with('message', 'Posts added successfully');
    }
}