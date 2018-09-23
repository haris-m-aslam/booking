<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id', 'seat_id', 'slot_id'];

    public function show(){
        return $this->belongsTo('App\ShowTime', 'slot_id');
    }

    public function seat(){
        return $this->belongsTo('App\Seat');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
