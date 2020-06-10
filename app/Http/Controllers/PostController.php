<?php

namespace App\Http\Controllers;

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
    }
}
