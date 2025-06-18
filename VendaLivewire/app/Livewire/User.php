<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class User extends Component
{


    public Collection $users;

    public $isEdit = false;

    public ModelsUser $user;
    public bool $modalOpened = false;



    
    public function openModal()
    {
        $this->modalOpened = true;
        $this->dispatch('openModal');
    }
    public function closeModal()
    {
        $this->dispatch('closeModal');
    }


    public function addUser(){

        $this->isEdit = false;
        $this->user = new ModelsUser();

        $this->openModal();


    }

    public function save(){
        
        $this->validate();

        dd($this->user);
    }


    public function mount(){
        $this->users =  ModelsUser::latest()->limit(5)->get();
    }

    public function render()
    {


        return view('livewire.user');
    }
}
