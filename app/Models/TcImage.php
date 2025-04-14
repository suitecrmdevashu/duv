<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcImage extends Model
{
    use HasFactory;
    protected $table = "tcimages";
    public function sequence()
    {
        return $this->belongsTo(Sequence::class, 'sequence_id');
    }
}
