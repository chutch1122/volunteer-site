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

    public function organizations()
    {
        return $this->belongsToMany('App\Organization');
    }

    public function formattedPhoneNumber() {
        return "(".substr($this->phone_number, 0, 3).") ".substr($this->phone_number, 3, 3)."-".substr($this->phone_number, 6);
    }

    public function phoneNumberSegment($segmentNumber)
    {
        if ($segmentNumber == 1){
            return substr($this->phone_number, 0, 3);
        }
        else if ($segmentNumber == 2){
            return substr($this->phone_number, 3, 3);
        }
        else if ($segmentNumber == 3){
            return substr($this->phone_number, 6);
        }

        return '';
    }
}
