<div>
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-xl mt-10">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">طلباتي</h2>

    @forelse($requests as $request)
        <div class="border-b pb-4 mb-4">
            <div class="flex justify-between items-center">
                <div>
                    <div class="font-semibold text-lg">{{ $request->package->title }}</div>
                    <div class="text-sm text-gray-600">تاريخ الطلب: {{ $request->created_at->format('Y-m-d') }}</div>
                </div>
                <div class="text-blue-600 font-bold">
                    {{ number_format($request->package->price) }} ريال
                </div>
            </div>

            @if($request->notes)
                <div class="text-gray-700 mt-2 text-sm">ملاحظات: {{ $request->notes }}</div>
            @endif
        </div>
    @empty
        <div class="text-gray-500 text-center">لا توجد طلبات بعد.</div>
    @endforelse
</div>

<div class="text-sm mt-1 text-gray-600">
    الحالة: <span class="font-semibold {{ 
        $request->status === 'معلق' ? 'text-yellow-500' :
        ($request->status === 'مؤكد' ? 'text-green-600' : 'text-red-500') 
    }}">
        {{ $request->status }}
    </span>
</div>

</div>