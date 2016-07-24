<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Listing extends Model
{
    protected $table = 'listings';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'contact_id',
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

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
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
