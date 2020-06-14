<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Post;

class Slug
{
    public static function getUniqueSlug($title, $model = Post::class)
    {
        $slug = Str::slug($title);

        $similar_slugs = $model::select('slug')->where('slug', 'like', $slug.'%')->get();

        if(!$similar_slugs->contains('slug', $slug))
        {
            return $slug;
        }

        for($i = 1; $i <= 10; $i++)
        {
            $new_slug = $slug.'-'.$i;

            if(!$similar_slugs->contains('slug', $new_slug))
            {
                return $new_slug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }
}