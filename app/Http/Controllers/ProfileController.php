<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function showMyProfile()
    {
        $user = auth()->user();

        $user->stats = $this->getUserStats($user);

        return view('profile.show', compact('user'));
    }

    public function show(User $user)
    {
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;

        $user->stats = $this->getUserStats($user);

        return view('profile.show', compact('user', 'follows'));
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
            'image' => 'image',
        ]);

        $user = auth()->user();

        if(request('image'))
        {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        $user->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }

    private function getUserStats(User $user)
    {
        return [
            'followers_count' => Cache::remember(
                'count.followers.' . $user->id,
                now()->addSeconds(60),
                function () use ($user)
                {
                    return $user->profile->followers->count();
                }
            ),

            'posts_count' => Cache::remember(
                'count.posts.' . $user->id,
                now()->addSeconds(60),
                function () use ($user)
                {
                    return $user->posts->count();
                }
            ),

            'following_count' => Cache::remember(
                'count.following.' . $user->id,
                now()->addSeconds(60),
                function () use ($user)
                {
                    return $user->following->count();
                }
            ),
        ];
    }
}
