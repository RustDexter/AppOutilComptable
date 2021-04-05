<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dossier extends Component
{
    public $data, $nom, $nbrEmployes,$capitale, $selected_id;
    public $updateMode = false;
    public $deleteId = '';


    public function render()
    {
        $this->data=\App\Models\Dossier::all();
        return view('livewire.dossier');
    }

    private function resetInput()
    {
        $this->nom = "";
        $this->nbrEmployes = "";
        $this->capitale = "";
    }
    public function store()
    {
        $data=$this->validate([
            'nom'=>"required",
            'nbrEmployes'=>"required",
            'capitale'=>"required"
        ]);
        /*$data=([
            'nom'=>$this->nom,
            'nbrEmployes'=>$this->nbrEmployes,
            'capitale'=>$this->capitale
        ]);*/
        auth()->user()->dossiers()->create($data);
        $this->resetInput();
        session()->flash('message', 'Dossier Created Successfully.');
        $this->emit('dossierStore');
    }
    public function edit($id)
    {
        $this->updateMode=true;
        $record = \App\Models\Dossier::findOrFail($id);
        $this->selected_id = $id;
        $this->nom = $record->nom;
        $this->nbrEmployes =$record->nbrEmployes;
        $this->capitale = $record->capitale;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInput();
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'nom'=>"required",
            'nbrEmployes'=>"required",
            'capitale'=>"required"
        ]);
        if ($this->selected_id) {
            $record = \App\Models\Dossier::find($this->selected_id);
            $record->update([
                'nom'=>$this->nom,
                'nbrEmployes'=>$this->nbrEmployes,
                'capitale'=>$this->capitale
            ]);
            $this->updateMode = false;
            $this->resetInput();
        }
        session()->flash('message', 'Dossier Updated Successfully.');
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        if ($this->deleteId) {
            $record = \App\Models\Dossier::where('id', $this->deleteId);
            $record->delete();
            session()->flash('message', 'Dossier Deleted Successfully.');
        }
    }
}
