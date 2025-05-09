<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;


class PackagesList extends Component
{
    public function render()
{
    $packages = Package::with('location')->where('is_active', true)->get();
    return view('livewire.packages-list', compact('packages' ))->layout('layouts.app'); 

        }
}
