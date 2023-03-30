<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AccidentImages;

class Accident extends Model
{
    use HasFactory;
    protected $table = 'accidents';
    protected $fillable =[
        'accidents_name',
        'accidents_categors_name',
        'location',
        'accidents_date',
        'accidents_time_start',
        'accidents_time_end',
        'details',
        'effect',
        'solutions',
        'follower_name'
    ];

    public function images(){
        return $this->hasMany(AccidentImages::class);
        }



        

}
