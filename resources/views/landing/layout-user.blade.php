<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singa Murz E-commerce</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @filamentStyles
    {{-- @livewireStyles --}}
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition duration-300">
    
    @include('landing.header')

    <!-- Sidebar -->
    <div class="flex">
        @include('landing.sidebar-user')

        <!-- Main Content -->
        <main class="flex-1 p-6">
            {{$slot}}
        </main>
    </div>

    @livewire('notifications') 
    @filamentScripts

</body>
</html>