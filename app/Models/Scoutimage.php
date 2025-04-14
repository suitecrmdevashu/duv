<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoutimage extends Model
{
    use HasFactory;
    protected $table = "scoutimages";
    protected $fillable = ['image_path','caption'];
}
