<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accident;

class AccidentImages extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'accidents_id',
    ];    

    public function accident(){
        return $this->belongsTo(Accident::class);
    }

}
