<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class GameDb extends Model
{
    //
    use Sluggable;
    protected $table = 'games';

    public function sluggable()
    {
        return [
            'game_url' => [
                'source' => 'game_name'
            ]
        ];
    }
}
