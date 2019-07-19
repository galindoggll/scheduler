<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
    /**
     * Role has many users
     *
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
