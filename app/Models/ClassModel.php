<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'classes';
   // public $table = 'classes';
    protected $fillable = [
        'className', //string
        'capacity',  //integer
        'isFulled',  //boleen
        'price',     //float
        'timeFrom',  //time
        'timeTo',   //time
    ];
}
