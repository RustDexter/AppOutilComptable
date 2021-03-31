<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DossierForm extends Component
{
    public $data, $nom, $nbrEmployes,$capitale;
    public $modelId;
    protected $listeners = [
        'getModelId',
        'forcedCloseModal'
    ];
    public function render()
    {
        return view('livewire.dossier-form');
    }
    private function resetInput()
    { 
        $this->modelId=null;
        $this->nom = null;
        $this->nbrEmployes = null;
        $this->capitale = null;
       
    }

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;

        $model = \App\Models\Dossier::find($this->modelId);
        
        $this->nom = $model->nom;
        $this->nbrEmployes = $model->nbrEmployes;
        $this->capitale = $model->capitale;
    }


    public function store()
    {
        $this->validate([
            'nom'=>"required",
            'nbrEmployes'=>"required",
            'capitale'=>"required"
        ]);
        $data=([
            'nom'=>$this->nom,
            'nbrEmployes'=>$this->nbrEmployes,
            'capitale'=>$this->capitale
        ]);

        if ($this->modelId) {
            \App\Models\Dossier::find($this->modelId)->update($data);
            $this->resetInput();
        } else {            
            $DossierInst = auth()->user()->dossiers()->create($data);
        }

        $this->resetInput();
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        
    }
    public function forcedCloseModal()
    {
        $this->resetInput();
        //supp errors
        $this->resetValidation();
    }
}
