<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{

    protected $table = 'api_keys';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'vendor_id',
    ];
}
