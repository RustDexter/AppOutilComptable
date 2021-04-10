<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{
    public $nom, $email, $tel, $adresse, $password, $confirmation;

    public $data;

    public function render()
    {
        return view('livewire.add-user');
    }

    public function addUser()
    {
        $this->error_index = 0;

        $data = $this->validate([
            'nom' => "required",
            'adresse' => "required",
            'tel' => "required",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => "min:8|required|same:password_confirmation",
        ]);

        $this->data = $data;

        dd($data);
        User::create($data);

        //session()->flash('message', 'Dossier Created Successfully.');
        $this->refresh();
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->nom = "";
        $this->email = "";
        $this->tel = "";
        $this->adresse = "";
    }

    public function refresh()
    {
        $this->users = User::findOrFail();
    }
}
