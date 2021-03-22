<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Charge;
use App\Models\Dossier;
use App\Models\Vente;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function getAll($id){
        $dossier=Dossier::where("id",$id)->first();
        $data=array();
        array_push($data,$dossier->achats);
        array_push($data,$dossier->ventes);
        array_push($data,$dossier->charges);
        return $data;
    }

    public function addFacture($id){

        $dossier=Dossier::where("id",$id)->first();
        $data=request()->validate([
            'libelle'=>"required",
            'description'=>"required",
            'prixHt'=>"required",
            'prixTva'=>"required",
            'prixTtc'=>"required",
            'tauxTva'=>"required"
        ]);

        switch (\request("FactureType")){
            case "achat":$dossier->achats()->create($data);break;
            case "vente":$dossier->ventes()->create($data);break;
            case "charges":$dossier->charges()->create(request()->all());break;
        }
    }

    public function updateFacture($id){
        $data=request()->validate([
            'libelle'=>"required",
            'description'=>"required",
            'prixHt'=>"required",
            'prixTva'=>"required",
            'prixTtc'=>"required",
            'tauxTva'=>"required"
        ]);

        switch (\request("FactureType")){
            case "achat":{
                $facture=Achat::where("id",$id)->first();
                $facture->update($data);
            }
            break;

            case "vente":{
                $facture=Vente::where("id",$id)->first();
                $facture->update($data);
            }
            break;

            case "charges":{
                $facture=Charge::where("id",$id)->first();
                $facture->update(request()->all());
            }
            break;
        }
    }

    public function deleteFacture($id){
        switch (\request("FactureType")){
            case "achat":Achat::where("id",$id)->first();break;
            case "vente":Vente::where("id",$id)->first();break;
            case "charges":Charge::where("id",$id)->first();break;
        }
    }


}
