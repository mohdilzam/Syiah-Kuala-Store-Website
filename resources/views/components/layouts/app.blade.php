<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'SKS' }}</title>
    
    <!-- Include Vite assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Include Preline CSS -->
    <link rel="stylesheet" href="path/to/preline.css">

    @livewireStyles
</head>

<body class="bg-slate-200 dark:bg-slate-700">
    @livewire('partials.navbar')    
    <main>
        {{ $slot }}
    </main>
    @livewire('partials.footer')  
    
    @livewireScripts
    
    <!-- Include Preline JS -->
    <script src="path/to/preline.js"></script>
    
    <!-- Include SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Include Livewire Alert scripts -->
    <x-livewire-alert::scripts />
    
    <!-- Initialize Preline components -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.HSStaticMethods && typeof window.HSStaticMethods.autoInit === 'function') {
                window.HSStaticMethods.autoInit();
            } else {
                console.error("HSStaticMethods or autoInit method is not available.");
            }
        });

        document.addEventListener('livewire:navigated', () => {
            if (window.HSStaticMethods && typeof window.HSStaticMethods.autoInit === 'function') {
                window.HSStaticMethods.autoInit();
            } else {
                console.error("HSStaticMethods or autoInit method is not available.");
            }
        });
    </script>
</body>
</html>
