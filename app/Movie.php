<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Movie extends Model
{
    //
    use SoftDeletes;
    protected $table= "movies";
    protected $fillable = [
        'name', 'cast', 'direction','duration','genre_id'
    ];
    protected $dates = ['deleted_at'];
}
