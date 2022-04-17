<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';
    protected $fillable = 
     [
        'title',
        'isi'
     ];


    use HasFactory;
}
