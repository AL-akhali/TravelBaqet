<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use App\Models\PackageRequest;

class BookPackageForm extends Component
{
    public Package $package;

    public $name, $email, $phone, $notes;

    public function mount(Package $package)
    {
        $this->package = $package;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string|max:1000',
        ]);

        PackageRequest::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'notes' => $this->notes,
            'package_id' => $this->package->id,
            'user_id' => auth()->id(),
        ]);

        session()->flash('success', 'تم إرسال طلبك بنجاح، سنتواصل معك قريبًا.');

        $this->reset(['name', 'email', 'phone', 'notes']);
    }

    public function render()
    {
        return view('livewire.book-package-form');
    }
}
