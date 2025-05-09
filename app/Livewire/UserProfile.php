<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
    use WithFileUploads;  // لتفعيل رفع الملفات

    public $name;
    public $email;
    public $profile_image;

    public function mount()
    {
        // تحميل بيانات المستخدم الحالي
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->profile_image = $user->profile_image; // إذا كان المستخدم قد رفع صورة مسبقًا
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_image' => 'nullable|image|max:1024', // الحد الأقصى لحجم الصورة 1MB
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->profile_image) {
            // حفظ الصورة المرفوعة
            $imagePath = $this->profile_image->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->save();

        session()->flash('message', 'تم حفظ التعديلات بنجاح!');
    }
    public function render()
    {
        return view('livewire.user-profile');
    }
}
