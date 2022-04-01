<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $body;
    public $excerpt;
    public $date;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->body = $body;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
    }


    public static function all(){
        return cache()->remember("posts.all", now()->addSecond(), function(){
            return collect(File::allFiles(resource_path("posts/")))
                ->map(function($file){
                    $document= YamlFrontMatter::parseFile($file);

                    return new Post(

                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })
                ->sortByDesc("date");
        });

    }

    public static function find($slug){

        return static::all()->firstWhere("slug", $slug);
    }
}
