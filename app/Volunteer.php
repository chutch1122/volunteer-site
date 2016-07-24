<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = 'volunteers';


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function listing()
    {
        return $this->hasOne('App\Listing');
    }

    public function reject()
    {
        $this->rejected_at = Carbon::now();
        $this->approved_at = null;
        $this->save();
    }

    public function approve()
    {
        $this->approved_at = Carbon::now();
        $this->rejected_at = null;
        $this->save();
    }
}
