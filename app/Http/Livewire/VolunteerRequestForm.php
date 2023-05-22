<?php

namespace App\Http\Livewire;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;
use Illuminate\View\View;

class VolunteerRequestForm extends Component
{
    public $name;
    public $email;
    public $subject = 'Solicitud de alta de voluntario/a';
    public $message;
    public $checkbox = false;
    public $username;

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

    public function mount()
    {
        $this->loadUsernameIfAuthenticated();
    }

    public function submit()
    {
        $this->validate();
        
        $this->resetErrorBag();

        $this->emit('alert', 'success', 'Solicitud enviada correctamente.');
    }

    public function loadUsernameIfAuthenticated()
    {
        if (auth()->check()) {
            $this->username = auth()->user()->name;
        }
    }

    public function render(): View
    {
        return view('livewire.volunteer-request-form');
    }
}
