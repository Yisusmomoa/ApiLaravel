<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;
    protected $table="_objetos";

    protected $fillable = [
        'NombreObjeto',
    ];
    public $timestamps=false;

}
