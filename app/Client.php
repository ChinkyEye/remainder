<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
    

    public function getScheduleCount()
    {
        return $this->hasMany('App\Notification','client_id','id');
    }

    public function getScheduleCountLatest()
    {
        return $this->hasMany('App\Notification','client_id','id')->orderBy('id','DESC')->take(1);
    }
    public function getScheduleCountLatest2()
    {
        return $this->hasMany('App\Notification','client_id','id')->orderBy('id','DESC');
    }

}
