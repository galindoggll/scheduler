<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['first_name', 'last_name', 'gender', 'user_id', 'type'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
