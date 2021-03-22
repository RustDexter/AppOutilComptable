<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    public function getAll(){
        return Dossier::all();
    }

    public function addDossier(){
        $data=request()->validate([
            'nom'=>"required",
            'nbrEmployes'=>"required",
            'capitale'=>"required"
        ]);
        auth()->user()->dossiers()->create($data);
    }

    public function updateDossier($id){
        $dossier=Dossier::where("id",$id)->get();
        $data=request()->validate([
            'nom'=>"required",
            'nbrEmployes'=>"required",
            'capitale'=>"required"
        ]);
        $dossier->update($data);
    }

    public function deleteDossier($id){
        Dossier::where("id",$id)->get()->delete();
    }
}
