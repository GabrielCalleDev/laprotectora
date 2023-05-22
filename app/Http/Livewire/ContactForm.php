<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $checkbox = false;
    public $username;

    protected $rules = [
        'name'     => 'required|min:4',
        'email'    => 'required|email',
        'subject'  => 'required|min:4',
        'message'  => 'required|min:4',
        'checkbox' => 'accepted',
    ];

    protected $messages = [
        'name.required'     => 'El nombre es obligatorio.',
        'name.min'          => 'El nombre debe tener al menos 4 caracteres.',
        'email.required'    => 'El email es obligatorio.',
        'email.email'       => 'El email debe ser un email válido.',
        'subject.required'  => 'El asunto es obligatorio.',
        'subject.min'       => 'El asunto debe tener al menos 4 caracteres.',
        'message.required'  => 'El mensaje es obligatorio.',
        'message.min'       => 'El mensaje debe tener al menos 4 caracteres.',
        'checkbox.accepted' => 'Debes aceptar la política de privacidad y protección de datos.',
    ];

    public function mount()
    {
        $this->loadUserIfAuthenticated();
    }

    public function submit()
    {
        $this->validate();

        $this->emit('alert', 'success', 'Contacto enviado correctamente.');
        
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
        return view('livewire.contact-form');
    }
}
