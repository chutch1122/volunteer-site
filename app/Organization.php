<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';

    protected $fillable = [
        'name',
        'website',
        'mission_statement',
        'description'
    ];

    public function creator()
    {
        //return User::where('id', $this->user_id)->get()->first();
        return $this->belongsTo('App\User', 'user_id');
    }

    public function contacts()
    {
        return $this->belongsToMany('App\Contact');
    }

    /*public function users()
    {
        return $this->belongsToMany('App\User');
    }*/
}
