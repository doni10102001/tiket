<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id', 'description',];
    protected $table = 'notifications';
}
