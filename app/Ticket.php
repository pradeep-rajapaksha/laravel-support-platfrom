<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'reference', 'description', 'status', 'created_at', 'updated_at', 'response'
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
    public static $message = [];

    /**
     * The customer that belong to.
     */
    public function customer()
    {   
        return $this->belongsTo('App\Customer'); 
    }

    /**
     * The customer that belong to.
     */
    public function responseBy()
    {
        return $this->belongsTo('App\User', 'response_by', 'id'); 
    }
}
