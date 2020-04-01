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
//relacion uno
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //creamos como acortar el texto del body dentro del blog
    public function getGetExcerptAttribute()
    {
        return substr($this->body, 0 ,140);
    }
}
