<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Services\Slug;

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

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('post.index', compact('posts'));
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $this->authorize('update', $post);

        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $data = request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,'.$post->id,
            'description' => 'required',
            'thumbnail' => 'image',
            'content' => 'required',
        ]);

        if(request('thumbnail'))
        {
            $thumbnailPath = request('thumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$thumbnailPath}"))->fit(1200, 1200);
            $image->save();

            $thumbnailArray = ['thumbnail' => $thumbnailPath];
        }

        $post->update(array_merge(
            $data,
            $thumbnailArray ?? []
        ));

        return redirect('/profile');
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
            'slug' => Slug::getUniqueSlug($data['title']),
            'description' => $data['description'],
            'thumbnail' => $thumbnailPath ?? '',
            'content' => $data['content'],
        ]);

        return redirect('/profile');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail(); 

        return view('post.show', compact('post'));
    }
}
