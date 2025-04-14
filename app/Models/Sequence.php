<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    use HasFactory;
    public function tcYear()
    {
        return $this->belongsTo(TcYear::class, 'tcyear_id');
    }

    public function tcImages()
    {
        return $this->hasMany(TcImage::class, 'sequence_id');
    }
    
}
