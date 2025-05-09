<div class="bg-gradient-to-b from-blue-100 to-white min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">باقات السفر</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($packages as $package)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->title }}"
                         class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-300">

                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $package->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ $package->location->name ?? 'بدون موقع' }}</p>

                        <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                            <span>{{ $package->days }} يوم</span>
                            <span class="font-semibold text-blue-600">{{ number_format($package->price) }} ريال</span>
                        </div>

                        <a href="{{ route('package.show', $package->id) }}" class="block w-full py-2 bg-blue-600 text-white text-center rounded-lg font-medium hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                            احجز الآن
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-600 text-lg">
                    لا توجد باقات متاحة حالياً.
                </div>
            @endforelse
        </div>
    </div>
</div>
