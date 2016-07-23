<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'listings';

    protected $fillable = [
        'title',
        'description',
        'starts_at',
        'ends_at'
    ];

    protected $dates = ['starts_at', 'ends_at'];

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function orginization()
    {
        return $this->belongsTo('App\Orginization');
    }
}
