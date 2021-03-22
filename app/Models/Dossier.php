<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function achats()
    {
        return $this->hasMany(Achat::class);
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
