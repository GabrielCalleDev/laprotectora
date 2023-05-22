<?php

namespace App\Http\Livewire;

use App\Models\ContactForm;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;
use Illuminate\View\View;

class VolunteerRequestForm extends Component
{
    public $name;
    public $email;
    public $subject = 'Solicitud de alta de voluntario/a';
    public $message;
    public $phone;
    public $checkbox = false;
    public $username;
    public $showForm = true;

    protected $rules = [
        'name'     => 'required|min:4',
        'email'    => 'required|email',
        'phone'    => 'required',
        'message'  => 'required|min:4',
        'checkbox' => 'accepted',
    ];

    protected $messages = [
        'name.required'     => 'El nombre es obligatorio.',
        'name.min'          => 'El nombre debe tener al menos 4 caracteres.',
        'email.required'    => 'El email es obligatorio.',
        'email.email'       => 'El email debe ser un email válido.',
        'phone.required'    => 'El teléfono es obligatorio.',
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
        $validatedData = $this->validate();

        $validatedData['subject'] = $this->subject;

        if(auth()->check()) {
            $validatedData['user_id'] = auth()->user()->id;
        }

        $validatedData['status'] = 'Nuevo';

        ContactForm::create($validatedData);
        
        $this->resetErrorBag();

        $this->showForm = false;

        $this->emit('alert', 'success', 'Solicitud enviada correctamente.');
    }

    public function loadUsernameIfAuthenticated()
    {
        if (auth()->check()) {
            $this->username = auth()->user()->name;
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
        }
    }

    public function render(): View
    {
        return view('livewire.volunteer-request-form');
    }
}
