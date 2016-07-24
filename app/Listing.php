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

    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }

    public function open()
    {
        $this->closed_at = null;
        $this->save();
    }

    public function close()
    {
        $this->closed_at = Carbon::now();
        $this->save();
    }
}
