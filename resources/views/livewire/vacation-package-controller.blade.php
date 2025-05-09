<div class="vacation-packages">
    <h1>باقات السفر</h1>
    <div class="package-list">
        @foreach ($vacationPackages as $package)
            <div class="package-item">
                <h2>{{ $package->name }}</h2>
                <p>{{ $package->description }}</p>
                <p>السعر: {{ $package->price }} USD</p>
                <p>المدة: {{ $package->duration }} أيام</p>
                @if($package->image)
                    <img src="{{ asset('storage/' . $package->image) }}" alt="Image of {{ $package->name }}">
                @endif
            </div>
        @endforeach
    </div>
</div>

