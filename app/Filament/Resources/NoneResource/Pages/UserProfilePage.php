<?php

namespace App\Filament\Resources\NoneResource\Pages;

use App\Filament\Resources\NoneResource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

class UserProfilePage extends Page
{
     protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'filament.pages.user-profile-page';

    public $name;
    public $email;
    public $profile_image;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->profile_image = $user->profile_image;
    }

    public function save()
    {
        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->profile_image) {
            // رفع الصورة وتخزينها
            $imagePath = $this->profile_image->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->save();

        session()->flash('message', 'تم حفظ التعديلات بنجاح!');
    }
}
