<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;


class PackageDetails extends Component
{

    public Package $package;

    public function mount($id)
    {
        $this->package = $this->package = Package::with('location')->where('id', $id)->firstOrFail();

    }
    public function render()
    {
        // return view('livewire.package-details');
        return view('livewire.package-details')->layout('layouts.app'); 

    }
}
