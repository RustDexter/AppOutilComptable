<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dossier extends Component
{
    public $data, $nom, $nbrEmployes,$capitale;
    public $SelectedDs;
    public $action;
    public $updateModal;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function render()
    {
        $this->data=\App\Models\Dossier::all();
        return view('livewire.dossier');
    }

    public function add(){
        $this->updateModal = false;
        $this->dispatchBrowserEvent('form');
    }

    public function selectDossier($DossierId , $action){
        $this->SelectedDs=$DossierId;
        if($action == 'delete'){
            $this->dispatchBrowserEvent('OpenDeleteModal');
        }else{
            $this->emit('getModelId',$this->SelectedDs);
            $this->dispatchBrowserEvent('form');
            $this->updateModal = true;
            
        }
    }

    public function destroy()
    {
            \App\Models\Dossier::destroy($this->SelectedDs);
            $this->dispatchBrowserEvent('CloseDeleteModal');   
    }  
}
