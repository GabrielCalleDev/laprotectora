<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;

class FavoriteButton extends Component
{
    public $pet;
    public $user;

    public function mount(Pet $pet)
    {
        $this->user = auth()->user();
        $this->pet  = $pet;
    }

    public function addFavorite( $petId )
    {
        $this->user->favorites()->attach($petId);
        $this->emit('alert', 'success', 'Mascota añadida a favoritos');
    }

    public function deleteFavorite( $petId )
    {
        $this->user->favorites()->detach($petId);
        $this->emit('alert', 'warning', 'Mascota eliminada de favoritos');
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
