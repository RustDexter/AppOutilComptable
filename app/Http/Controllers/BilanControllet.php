<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;

class BilanControllet extends Controller
{
    public function getBilan($id){
        $dossier=Dossier::where("id",$id)->first();
        $val=$dossier->ventes->sum('prixHt')-$dossier->achats->sum('prixHt')-$dossier->charges->sum('charges');
        return $val;
    }
}
