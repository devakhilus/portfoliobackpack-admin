<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings['site_name'] ?? 'My Portfolio' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @include('layouts.styles')
    </style>
</head>

<body>

    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <script>
        function toggleTheme() {
            const root = document.documentElement;
            const current = root.getAttribute('data-theme');
            const next = current === 'light' ? 'dark' : 'light';
            root.setAttribute('data-theme', next);
        }
    </script>

    {{-- jQuery (optional for AJAX support if needed) --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Here you allow child views to inject scripts --}}
    @yield('scripts')

</body>

</html>