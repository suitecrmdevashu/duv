<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandatory_public_disclosure extends Model
{
    use HasFactory;
    protected $table = "mandatory_public_disclosures";
    protected $guarded = [];
}
