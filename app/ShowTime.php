<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShowTime extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['slot', 'film_id'];

    public function film(){
        return $this->belongsTo('App\Film');
    }

    public function bookings(){
        return $this->hasMany('App\Booking', 'slot_id');
    }
}
