<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function maskapai()
    {
    	return $this->belongsTo('App\Maskapai');
    }

    public function reservation()
    {
    	return $this->hasOne('App\Reservation');
    }

    public function notification()
    {
        return $this->belongsTo('App\Notification');
    }
}
