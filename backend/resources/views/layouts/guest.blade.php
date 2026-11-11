<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hampiq Mikhuy | Acceso</title>
    <!-- Tus estilos de Hampiq Mikhuy -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0a1118] font-['Poppins'] text-white antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/" class="flex flex-col items-center gap-2">
                <img src="{{ asset('img/logo.png') }}" class="w-20 h-20 object-contain" alt="Hampiq Mikhuy Logo">
                <span class="text-xl font-bold tracking-wide">Hampiq Mikhuy</span>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-[#111c26] border border-gray-700 shadow-xl overflow-hidden sm:rounded-xl">
            {{ $slot }}
        </div>
    </div>
</body>
</html>