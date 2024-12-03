<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Existing head content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $sarana->nama }} - SMAN 1 Balige</title>
    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        /* Your existing styles */
    </style>
</head>

<body class="flex flex-col min-h-screen bg-white text-gray-800 font-sans">

    <!-- Include Header -->
    @include('layouts.header')

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
            <!-- Display the cover image if available -->
            @if($sarana->cover)
                <img src="{{ asset('storage/' . $sarana->cover) }}" alt="{{ $sarana->nama }}"
                    class="w-96 h-auto mb-6 mx-auto">
            @endif

            <h1 class="text-3xl font-bold text-blue-800 mb-4 text-center">{{ $sarana->nama }}</h1>
            <div class="text-lg text-gray-700 mb-6">
                {!! nl2br(e($sarana->deskripsi)) !!}
            </div>
        </div>
    </main>

    <!-- Include Footer -->
    @include('layouts.footer')

</body>

</html>