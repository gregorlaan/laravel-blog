<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function showMyProfile()
    {
        $user = auth()->user();

        return view('profile.show', compact('user'));
    }

    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }

    public function update()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => '',
        ]);

        $user = auth()->user();

        if(request('image'))
        {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }

        $user->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));

        return redirect("/profile/{$user->id}");
    }
}
