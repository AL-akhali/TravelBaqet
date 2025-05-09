<div>
<div class="bg-white min-h-screen py-10">
    <div class="max-w-5xl mx-auto px-4">
        {{-- العنوان والسعر --}}
        <div class="mb-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">{{ $package->title }}</h1>
            <p class="text-gray-500">{{ $package->location->name ?? 'بدون موقع' }}</p>
            <div class="text-blue-600 text-2xl font-bold mt-2">{{ number_format($package->price) }} ريال</div>
        </div>

        {{-- صورة رئيسية --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <img src="{{ asset('storage/' . $package->image) }}" alt="صورة الباقة" class="rounded-lg object-cover w-full h-32 hover:scale-105 transition" />
            {{-- إذا كان لديك صور إضافية --}}
            @if($package->additional_images && count($package->additional_images) > 0)
                @foreach ($package->additional_images as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="صورة إضافية" class="rounded-lg object-cover w-full h-32 hover:scale-105 transition" />
                @endforeach
            @endif
        </div>


        {{-- معرض الصور --}}

        {{-- الوصف --}}
        <div class="prose max-w-none mb-8 text-gray-700 leading-loose">
            {!! nl2br(e($package->description)) !!}
        </div>

        {{-- زر الحجز --}}
        <div class="text-center">
            <a href="#booking"
               class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-blue-700 transition">
                احجز الآن
            </a>
        </div>
    </div>
</div>

@livewire('book-package-form', ['package' => $package])

</div>