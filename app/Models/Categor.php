<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categor extends Model
{
    use HasFactory;
    protected $table = 'categors';
    protected $fillable = 
    ['categors_name', 'status'];

}
