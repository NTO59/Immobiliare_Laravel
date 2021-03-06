<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * On autorise n'importe quelle propriété à être remplie dans l'objet
     * ATTENTION de ne pas faire de $request->all().
     */
    protected $guarded = [];
}
