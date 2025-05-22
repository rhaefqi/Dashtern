<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title', 'Dashtern')</title>
</head>

<body class="bg-[#e7efee]">

    <!-- Layout Utama -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Konten Utama -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>

    </div>

</body>

</html>
