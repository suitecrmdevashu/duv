<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achiever extends Model
{
    use HasFactory;
    protected $table = "achievers";
    protected $fillable = ['caption','file_path','created_at','updated_at'];
}
