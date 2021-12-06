<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public function __construct(public $title, public $excerpt, public $slug, public $date, public $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all() {

        return cache()->rememberForever('posts.all', function () {

            return collect( File::files( resource_path('posts') ) )
            ->map( fn( $file ) => YamlFrontMatter::parseFile($file) )
            ->map( fn( $document ) => new Post(
                $document->title,
                $document->excerpt,
                $document->slug,
                $document->date,
                $document->body(),
            ))
            ->sortByDesc('date');

        });


        // $files = File::files( resource_path("posts/") );

        // return array_map( fn($file) => $file->getContents(), $files );

    }

    public static function find($slug) {

        return static::all()->firstWhere('slug', $slug);

    }

    public static function findOrFail($slug) {

        $post = static::find($slug);

        if ( ! $post ) {
            throw new ModelNotFoundException();
        }

        return $post;

    }

}