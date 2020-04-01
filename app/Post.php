<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;//urlsss
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true // cuando se guarda el titulo se vuelve un slug
            ]
        ];
    }
}
