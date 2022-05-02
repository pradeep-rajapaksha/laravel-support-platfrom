<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be valid for create.
     *
     * @var array
     */
    public static $rules = [
        'name'			=> 'required',
        'email'     	=> 'required',
        'phone'     	=> 'required',
    ];

    /**
     * The attributes that should be valid for create.
     *
     * @var array
     */
    public static $message = [];

    /**
     * Get the class record associated with the user.
     */
    public function issues()
    {
        return $this->hasMany('App\Ticket');
    }

}
