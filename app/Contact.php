<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    
    protected $fillable = [
        'address_id',
        'name',
        'email',
        'phone_number',
        'fax_number'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
