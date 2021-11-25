<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uud extends Model
{
    protected $fillable = [
        'bab', 'pasal','judul', 'ayat', 'bunyi'
    ];
}
