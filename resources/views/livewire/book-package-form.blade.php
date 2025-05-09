<div id="booking" class="mt-16 max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md">
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">طلب حجز هذه الباقة</h2>

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium text-gray-700">الاسم الكامل *</label>
            <input type="text" wire:model.defer="name"
                   class="w-full rounded-lg border-gray-300 focus:ring-blue-500" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">البريد الإلكتروني</label>
            <input type="email" wire:model.defer="email"
                   class="w-full rounded-lg border-gray-300 focus:ring-blue-500">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">رقم الجوال</label>
            <input type="text" wire:model.defer="phone"
                   class="w-full rounded-lg border-gray-300 focus:ring-blue-500">
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">ملاحظات إضافية</label>
            <textarea wire:model.defer="notes" rows="4"
                      class="w-full rounded-lg border-gray-300 focus:ring-blue-500"></textarea>
            @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-semibold transition">
            إرسال الطلب
        </button>
    </form>
</div>
