<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;

class Utilisateurs extends Component
{
    public $name, $photo, $email, $tel, $adresse, $password, $confirmation, $data, $deleteId;

    use WithFileUploads;

    public $users;

    public $updateMode;

    public $selected_id;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.utilisateurs');
    }

    protected function rules()
    {
        return [
            'name' => "required",
            'adresse' => "required",
            'tel' => "required",
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->selected_id,
            'password' => "min:8|required|same:confirmation",
            'photo' => 'image|max:1024', // 1MB Max
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addUser()
    {
        $this->error_index = 0;

        $data = $this->validate($this->rules());

        if ($this->photo instanceof UploadedFile)
            $data['profile_photo_path'] = $this->photo->storePublicly('profile-photos', 'public');

        User::create($data);

        //session()->flash('message', 'Dossier Created Successfully.');
        $this->refresh();
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = "";
        $this->email = "";
        $this->tel = "";
        $this->adresse = "";
    }

    public function refresh()
    {
        $this->users = User::all();
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        if ($this->deleteId) {
            $record = \App\Models\User::where('id', $this->deleteId);
            $record->delete();
            session()->flash('message', 'Comptable Deleted Successfully.');
        }
    }

    public function edit($id)
    {
        $this->selected_id = $id;
        $user = \App\Models\User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->tel = $user->tel;
        $this->adresse = $user->adresse;
        $this->updateMode = true;
    }

    public function update()
    {
        $user = User::findOrFail($this->selected_id);
        $data = $this->validate($this->rules());
        if ($this->photo instanceof UploadedFile)
            $data['profile_photo_path'] = $this->photo->storePublicly('profile-photos', 'public');

        $user->update($data);

        $this->refresh();
        $this->resetInput();
        session()->flash('message', 'Comptable Updated Successfully.');
    }
}
