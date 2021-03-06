<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'description', 'address', 'city', 'zip_code'
    ];

    /**
     * Get the User associated with this restaurant.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get Pictures associated to this restaurant.
     */
    public function pictures()
    {
        return $this->hasMany('App\Models\Picture');
    }

    /**
     * Get Reviews associated to this restaurant.
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}
