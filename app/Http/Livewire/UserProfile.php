<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public $favorites;
    public $user;
    public $adoptionsInProcess;

    public function mount(){
        $this->user      = User::find(auth()->user()->id);
        $this->favorites = auth()->user()->favorites;
        $this->adoptionsInProcess = $this->getAdoptionsInProcess();
    }

    public function removeFavorite(Pet $pet){
        $this->user->favorites()->detach($pet->id);
        $this->favorites = auth()->user()->favorites;
        $this->emit('alert', 'warning', 'Mascota eliminada de favoritos');
    }

    public function getAdoptionsInProcess()
    {
        return $this->user->adoptions()->where('status', '!=', 'Finalizado')->get();
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
