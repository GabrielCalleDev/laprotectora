<?php

namespace App\Http\Livewire;
use Filament\Notifications\Notification;

use Livewire\Component;
use Illuminate\View\View;

class VolunteerRequestForm extends Component
{
    public $name;
    public $email;
    public $subject = 'Solictud de alta como voluntario/a';
    public $message;
    public $checkbox = false;
    public $username;

    protected $rules = [
        'name'     => 'required|min:6',
        'email'    => 'required|email',
        'message'  => 'required|min:10',
        'checkbox' => 'accepted',
    ];

    protected $messages = [
        'name.required'     => 'El nombre es obligatorio.',
        'name.min'          => 'El nombre debe tener al menos 6 caracteres.',
        'email.required'    => 'El email es obligatorio.',
        'email.email'       => 'El email debe ser un email válido.',
        'message.required'  => 'El mensaje es obligatorio.',
        'message.min'       => 'El mensaje debe tener al menos 10 caracteres.',
        'checkbox.accepted' => 'Debes aceptar la política de privacidad y protección de datos.',
    ];

    public function sendRequest()
    {
        $this->validate();

        $this->resetForm();

        $this->emit('alert', 'success', 'Solicitud enviada correctamente.');
    }

    public function isAuthenticated()
    {
        return auth()->check();
    }

    public function mount()
    {
        Notification::make() 
            ->title('Saved successfully')
            ->success()
            ->send(); 
    }

    public function loadUsernameIfAuthenticated()
    {
        if ($this->isAuthenticated()) {
            $this->username = auth()->user()->name;
        }
    }

    public function render(): View
    {
        return view('livewire.volunteer-request-form');
    }
}
