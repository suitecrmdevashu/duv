<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtopic extends Model
{
    use HasFactory;
    protected $fillable = [
        'tcyear_id',
        'sequence_number',
    ];
    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
