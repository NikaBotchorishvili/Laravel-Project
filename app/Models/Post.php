<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post
{
    public static function all(){
        $posts = File::allFiles(resource_path("posts/"));

        return array_map(function($post){
            return $post->getContents();
        }, $posts);
    }

    public static function find($slug){
        if(!file_exists($path = resource_path("posts/{$slug}.html"))){
            dd("File not found!");
        }

        return cache()->remember("posts/{slug}", now()->addMinutes(5), function () use ($path) {
            return file_get_contents($path);
        });
    }
}
