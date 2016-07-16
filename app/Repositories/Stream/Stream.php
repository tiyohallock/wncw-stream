<?php

namespace App\Repositories\Stream;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    public $table = "streams";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'title',
		'image',
		'description',
		' date',

    ];

    public static $rules = [
        // create rules
    ];

    // Stream 

}
