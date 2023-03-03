<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annonce extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'description', 'type', 'ville', 'superficie', 'neuf', 'prix'];
    static $type_list = ['appartement', 'maison', 'villa', 'magasin', 'terrain'];
}
