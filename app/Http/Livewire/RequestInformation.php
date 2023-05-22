<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RequestInformation extends Component
{
    public $pet;
    public $show = false;

    public $name;
    public $username;
    public $email;
    public $subject;
    public $message;
    public $checkbox;

    protected $rules = [
        'name'     => 'required|min:4',
        'email'    => 'required|email',
        'message'  => 'required|min:4',
        'checkbox' => 'accepted',
    ];

    protected $messages = [
        'name.required'     => 'El nombre es obligatorio.',
        'name.min'          => 'El nombre debe tener al menos 4 caracteres.',
        'email.required'    => 'El email es obligatorio.',
        'email.email'       => 'El email debe ser un email válido.',
        'message.required'  => 'El mensaje es obligatorio.',
        'message.min'       => 'El mensaje debe tener al menos 4 caracteres.',
        'checkbox.accepted' => 'Debes aceptar la política de privacidad y protección de datos.',
    ];

    public function mount($pet)
    {
        $this->pet = $pet;
        $this->loadUserIfAuthenticated();
    }

    public function submit()
    {
        $this->validate();

        $this->emit('alert', 'success', 'Solicitud enviada correctamente.');
        
        $this->resetErrorBag();
    }

    public function loadUserIfAuthenticated()
    {
        if (auth()->check()) {
            $this->username = auth()->user();
        }
    }

    public function render()
    {
        return view('livewire.request-information');
    }
}
