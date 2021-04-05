<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Charge;
use App\Models\Dossier;
use App\Models\Vente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $dossiersData=Dossier::all();
        $dossiers=Dossier::count();
        $achats=Achat::count();
        $ventes=Vente::count();
        $charges=Charge::count();
        return view('dashboard', [
            'dossiersData'=>$dossiersData,
            'dossiers' => $dossiers,
            'ventes' => $ventes,
            'charges' => $charges,
            "achats"=>$achats
        ]);
    }
}
