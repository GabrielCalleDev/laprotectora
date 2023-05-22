<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactForm as ContactFormModel;

class ContactForm extends Component
{
    public $show = false;

    public $name;
    public $username;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $checkbox = false;

    public $showForm = true;

    protected $rules = [
        'name'     => 'required|min:4',
        'email'    => 'required|email',
        'phone'    => 'required',
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
        'phone.required'    => 'El teléfono es obligatorio.',
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
        $validatedData = $this->validate();

        if(auth()->check()) {
            $validatedData['user_id'] = auth()->user()->id;
        }

        $validatedData['status'] = 'Nuevo';

        ContactFormModel::create($validatedData);
        
        $this->resetErrorBag();

        $this->showForm = false;

        $this->emit('alert', 'success', 'Solicitud de información recibida correctamente.');
    }

    public function loadUserIfAuthenticated()
    {
        if (auth()->check()) {
            $this->username = auth()->user()->name;
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
