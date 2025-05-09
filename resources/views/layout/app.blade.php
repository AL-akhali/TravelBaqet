<!-- resources/views/components/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Travel Packages') }}</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- هنا يمكن أن تضيف الشريط العلوي أو أي عناصر تود إضافتها -->
        <nav class="bg-blue-600 text-white p-4">
            <div class="max-w-7xl mx-auto px-4">
                <a href="/" class="text-xl font-bold">باقات السفر</a>
            </div>
        </nav>

        <!-- المساحة الأساسية التي ستعرض فيها المحتوى -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
