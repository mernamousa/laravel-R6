<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    public $table = 'classes';
    protected $fillable = [
        'className', //string
        'capacity',  //integer
        'isFulled',  //boleen
        'price',     //float
        'timeFrom',  //time
        'timeTo',   //time
    ];
}
