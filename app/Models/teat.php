<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teat extends Model
{
    use HasFactory;
    protected $table = 'teats';
    protected $fillable = [
        'acc_name',
        'acc_categors_name',
          ];
}
