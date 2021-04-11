<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\User;
use Illuminate\Http\Request;

class BilanControllet extends Controller
{
    public function getAll($id)
    {
        $user = auth()->user()->getAuthIdentifier();
        $do = Dossier::where("user_id", '=', $user)->first();

        $dossier = Dossier::where("id", $id)->first();
        $data = array();
        array_push($data, $do);
        array_push($data, $dossier->achats);
        array_push($data, $dossier->charges);
        array_push($data, $dossier->ventes);
        $val = $dossier->ventes->sum('prixHt') - $dossier->achats->sum('prixHt') - $dossier->charges->sum('prixHt');
        $user = User::where("id", $user)->first();
        return view('livewire.bilan', ['data' => $data, 'prHt' => $val, 'user' => $user]);
    }
}
