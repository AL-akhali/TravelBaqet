<?php

namespace App\Livewire\User;
use App\Models\PackageRequest;
use Livewire\Component;

class PackageRequestsList extends Component
{
    public function render()
    {
        $requests = PackageRequest::with('package')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('livewire.user.package-requests-list', [
            'requests' => $requests,
        ])->layout('layouts.app');
        }
}
