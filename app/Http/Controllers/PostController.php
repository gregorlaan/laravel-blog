<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('post.create');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->latest()->get();

        return view('post.index', compact('posts'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'image',
            'content' => 'required',
        ]);

        if(request('thumbnail'))
        {
            $thumbnailPath = request('thumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$thumbnailPath}"))->fit(1200, 1200);
            $image->save();
        }

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'thumbnail' => $thumbnailPath ?? '',
            'content' => $data['content'],
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
