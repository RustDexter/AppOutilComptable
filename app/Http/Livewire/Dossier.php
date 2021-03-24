<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dossier extends Component
{
    public $data, $nom, $nbrEmployes,$capitale, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data=\App\Models\Dossier::all();
        return view('livewire.dossier');
    }

    private function resetInput()
    {
        $this->nom = null;
        $this->nbrEmployes = null;
        $this->capitale = null;
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
        auth()->user()->dossiers()->create($data);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = \App\Models\Dossier::findOrFail($id);
        $this->selected_id = $id;
        $this->nom = $record->nom;
        $this->nbrEmployes =$record->nbrEmployes;
        $this->capitale = $record->capitale;
        $this->updateMode = true;
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
            $this->resetInput();
            $this->updateMode = false;
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $record = \App\Models\Dossier::where('id', $id);
            $record->delete();
        }
    }
}
