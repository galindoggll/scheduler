<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffTypes extends Model
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
        return $this->belongsToMany(Staffs::class);
    }
}
