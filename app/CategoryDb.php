<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class CategoryDb extends Model
{
    //
    use Sluggable;
    protected $table = 'game_category';
    public function sluggable()
    {
        return [
            'category_url' => [
                'source' => 'category_name'
            ]
        ];
    }
}
