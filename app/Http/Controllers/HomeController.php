<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Charge;
use App\Models\Dossier;
use App\Models\Facture;
use App\Models\Role;
use App\Models\User;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){


        $monthlyDossier = Dossier::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();

        $monthlyFacture = Facture::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();

        $users=User::orderBy('last_login', 'desc')->take(4)->get();
        $Allexpert=Role::where("nom","=","expert")->first()->users->count();
        $Allnormal=Role::where("nom","=","normal")->first()->users->count();
        $dossiers=Dossier::count();
        $achats=Achat::count();
        $ventes=Vente::count();
        $charges=Charge::count();
        return view('dashboard', [
            'Allexpert'=>$Allexpert,
            'Allnormal'=>$Allnormal,
            'dossiers' => $dossiers,
            'ventes' => $ventes,
            'charges' => $charges,
            "achats"=>$achats,
            "monthlyDossier"=>$monthlyDossier,
            "users"=>$users,
            "monthlyFacture"=>$monthlyFacture,
        ]);
    }
}
