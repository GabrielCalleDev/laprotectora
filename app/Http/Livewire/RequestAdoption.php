<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RequestAdoption extends Component
{
    public $pet;
    public $show = false;

    public $user;
    public $message;

    protected $rules = [
        'message'  => 'required|min:4',
    ];

    protected $messages = [
        'message.required'  => 'El mensaje es obligatorio.',
        'message.min'       => 'El mensaje debe tener al menos 4 caracteres.',
    ];

    public function mount($pet)
    {
        $this->pet = $pet;
        $this->loadUserIfAuthenticated();
    }

    public function submit()
    {
        $this->validate();

        $this->emit('alert', 'success', 'Solicitud de adopción enviada correctamente.');
        
        $this->resetErrorBag();
    }

    public function loadUserIfAuthenticated()
    {
        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }

    public function render()
    {
        return view('livewire.request-adoption');
    }
}
