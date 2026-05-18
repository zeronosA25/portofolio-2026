<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';

    public bool $success = false;

    public function submit(): void
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        ContactMessage::create($data);

        $this->reset('name', 'email', 'subject', 'message');

        $this->success = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
