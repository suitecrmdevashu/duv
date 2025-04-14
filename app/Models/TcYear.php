<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcYear extends Model
{
    use HasFactory;
    protected $table = 'tcyears';
    public function sequences()
{
    return $this->hasMany(Sequence::class, 'tcyear_id'); 
}
}
