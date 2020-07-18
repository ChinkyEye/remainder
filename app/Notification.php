<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	public function user()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
    public function client()
    {
        return $this->belongsTo('App\Client','client_id','id');
    }
}
