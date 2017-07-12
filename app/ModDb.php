<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class ModDb extends Model
{
    //
    use Sluggable;
    protected $table = 'mods';
    public function sluggable()
    {
        return [
            'mods_url' => [
                'source' => 'mods_name'
            ]
        ];
    }
}
