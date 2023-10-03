<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public function __construct(public $title,public $excerpt,public $date,public $body,public $slug) {
    }
    
    public static function all()
    {   
        return cache()->rememberForever('posts.all',function() {
            return collect(File::allFiles(resource_path("posts/")))
            ->map(fn ($file) => YamlFrontMatter::parse(file_get_contents($file)))
            ->map(fn ($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            ->sortByDesc('date');
        });
        
        
    }

    public static function find(string $slug)
    {   
        return static::all()->firstWhere('slug',$slug);
    }
}