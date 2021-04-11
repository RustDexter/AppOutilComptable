<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Input;
use Livewire\Component;
use Illuminate\Http\UploadedFile;
use Livewire\WithFileUploads;

class Facture extends Component
{

    use WithFileUploads;

    public $libelle, $description, $prixHt, $prixTva, $tauxTva, $prixTtc, $type_id,$file;
    public $dossier, $dossiers, $dossier_id;
    public $achats = array(), $ventes = array(), $charges = array(), $types = array();

    public $deleteId = '', $selected_id, $error_index;

    protected function rules()
    {
        return [
            'libelle' => "required",
            'description' => "required",
            'prixHt' => "required",
            'prixTva' => "required",
            'prixTtc' => "required",
            'tauxTva' => "required",
            'file' => "required"
        ];
    }

    public function mount()
    {
        $this->dossier = \App\Models\Dossier::first();
        if (!is_null($this->dossier)) {
            $this->dossier = \App\Models\Dossier::first();
            $this->achats = $this->dossier->achats;
            $this->ventes = $this->dossier->ventes;
            $this->charges = $this->dossier->charges;
            $this->dossier_id = $this->dossier->id;
        }
        $this->types = \App\Models\Type::all();
        $this->type_id = $this->types->first()->id;
    }


    public function render()
    {
        $this->dossiers = \App\Models\Dossier::all();
        return view('livewire.facture');
    }

    public function refresh()
    {
        $this->dossier = \App\Models\Dossier::findOrFail($this->dossier_id);
        $this->achats = $this->dossier->achats;
        $this->ventes = $this->dossier->ventes;
        $this->charges = $this->dossier->charges;
    }

    private function resetInput()
    {
        $this->libelle = "";
        $this->description = "";
        $this->prixHt = "";
        $this->prixTva = "";
        $this->tauxTva = "";
        $this->prixTtc = "";
        $this->file = "";
        $this->type_id = $this->types->first()->id;
    }

    public function addVente()
    {
        $this->error_index = 0;

       $this->validate();

       if ($this->file instanceof UploadedFile){
        $data = [
            'libelle' => $this->libelle,
            'description' => $this->description,
            'prixHt' => $this->prixHt,
            'prixTva' => $this->prixTva,
            'prixTtc' =>$this->prixTtc,
            'tauxTva' =>$this->tauxTva,
            'facture_file_path'=>$this->file->storePublicly('factures', 'public')
        ];
        }

        $this->dossier->ventes()->create($data);

        //session()->flash('message', 'Dossier Created Successfully.');
        $this->refresh();
        $this->resetInput();
    }

    public function addAchat()
    {
        $this->error_index = 2;

        $this->validate();

        if ($this->file instanceof UploadedFile){
            $data = [
                'libelle' => $this->libelle,
                'description' => $this->description,
                'prixHt' => $this->prixHt,
                'prixTva' => $this->prixTva,
                'prixTtc' =>$this->prixTtc,
                'tauxTva' =>$this->tauxTva,
                'facture_file_path'=>$this->file->storePublicly('factures', 'public')
            ];
        }

        $this->dossier->achats()->create($data);


        $this->resetInput();
        //session()->flash('message', 'Dossier Created Successfully.');
        $this->refresh();
        $this->resetInput();
    }

    public function addCharge()
    {
        $this->error_index = 1;
        $this->validate();

        if ($this->file instanceof UploadedFile){
            $data = [
                'libelle' => $this->libelle,
                'description' => $this->description,
                'prixHt' => $this->prixHt,
                'prixTva' => $this->prixTva,
                'prixTtc' =>$this->prixTtc,
                'tauxTva' =>$this->tauxTva,
                'type_id' =>$this->type_id,
                'facture_file_path'=>$this->file->storePublicly('factures', 'public')
            ];
        }

        $this->dossier->charges()->create($data);


        $this->resetInput();
        //session()->flash('message', 'Dossier Created Successfully.');
        $this->refresh();
        $this->resetInput();
    }

    public function editCharge($id)
    {
        $record = \App\Models\Charge::findOrFail($id);
        $this->selected_id = $id;
        $this->libelle = $record->libelle;
        $this->description = $record->description;
        $this->prixHt = $record->prixHt;
        $this->prixTva = $record->prixTva;
        $this->tauxTva = $record->tauxTva;
        $this->prixTtc = $record->prixTtc;
        $this->type_id = $record->type_id;
    }

    public function editVente($id)
    {
        $record = \App\Models\Vente::findOrFail($id);
        $this->selected_id = $id;
        $this->libelle = $record->libelle;
        $this->description = $record->description;
        $this->prixHt = $record->prixHt;
        $this->prixTva = $record->prixTva;
        $this->tauxTva = $record->tauxTva;
        $this->prixTtc = $record->prixTtc;
        $this->type_id = $record->type_id;
    }

    public function editAchat($id)
    {

        $record = \App\Models\Achat::findOrFail($id);
        $this->selected_id = $id;
        $this->libelle = $record->libelle;
        $this->description = $record->description;
        $this->prixHt = $record->prixHt;
        $this->prixTva = $record->prixTva;
        $this->tauxTva = $record->tauxTva;
        $this->prixTtc = $record->prixTtc;
        $this->type_id = $record->type_id;

    }

    public function cancel()
    {
        $this->resetInput();
    }

    public function updateVente()
    {
        $this->error_index = 0;

        $data = $this->validate();


        if ($this->selected_id) {
            $record = \App\Models\Vente::find($this->selected_id);
            $record->update([
                'libelle' => $this->libelle,
                'description' => $this->description,
                'prixHt' => $this->prixHt,
                'prixTva' => $this->prixTva,
                'prixTtc' => $this->prixTtc,
                'tauxTva' => $this->tauxTva,
                'facture_file_path'=>$this->file->storePublicly('factures', 'public')
            ]);
        }
        //session()->flash('message', 'Dossier Updated Successfully.');
        $this->resetInput();
        $this->refresh();
    }

    public function updateCharge()
    {
        $this->error_index = 1;
        $data = $this->validate();


        if ($this->selected_id) {
            $record = \App\Models\Charge::find($this->selected_id);
            $record->update([
                'libelle' => $this->libelle,
                'description' => $this->description,
                'prixHt' => $this->prixHt,
                'prixTva' => $this->prixTva,
                'prixTtc' => $this->prixTtc,
                'tauxTva' => $this->tauxTva,
                'type_id' => $this->type_id,
                'facture_file_path'=>$this->file->storePublicly('factures', 'public')
            ]);
            
        }
        //session()->flash('message', 'Dossier Updated Successfully.');
        $this->resetInput();
        $this->refresh();
    }

    public function updateAchat()
    {
        $this->error_index = 2;
        $data = $this->validate();


        if ($this->selected_id) {
            $record = \App\Models\Achat::find($this->selected_id);
            $record->update([
                'libelle' => $this->libelle,
                'description' => $this->description,
                'prixHt' => $this->prixHt,
                'prixTva' => $this->prixTva,
                'prixTtc' => $this->prixTtc,
                'tauxTva' => $this->tauxTva,
                'facture_file_path'=>$this->file->storePublicly('factures', 'public')
            ]);
            
        }
        $this->resetInput();
        $this->refresh();
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function deleteVente()
    {


        if ($this->deleteId) {
            $record = \App\Models\Vente::where('id', $this->deleteId);
            $record->delete();
            $this->refresh();
        }
    }


    public function deleteAchat()
    {

        if ($this->deleteId) {
            $record = \App\Models\Achat::where('id', $this->deleteId);
            $record->delete();
            $this->refresh();
        }
    }

    public function deleteCharge()
    {
        if ($this->deleteId) {
            $record = \App\Models\Charge::where('id', $this->deleteId);
            $record->delete();
            $this->refresh();
        }
    }

    public function downloadFacture($path){
        if($path){
            return response()->download(storage_path("app\public\\".$path));
        }
        else{
            $this->addError('err', 'cette facture ne contient aucun fichier');
        }
        
    }
}
