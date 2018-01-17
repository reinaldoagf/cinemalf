<?php

namespace Cinema;

use Cinema\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    //
    
    use SoftDeletes;
    protected $table="genders";
    protected $fillable = [
        'genre'
    ];
    protected $dates = ['deleted_at'];
    public function movies()
    {
        return $this->belongsTo(Movie::class);
    }
}
