<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fashion extends Model
{
    use HasFactory,SoftDeletes;
   // protected $table = 'fashions';
    protected $fillable =[
        'productName',
        'description',
        'price',
        'published',
        'image',
        
    ];
}
