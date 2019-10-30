<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Maskapai extends Model
{
    protected $guared = 'id';

    protected $table = 'maskapai';

    public function maskapai()
    {
    	return $this->hasMany('App\Tickets');
    }
}
