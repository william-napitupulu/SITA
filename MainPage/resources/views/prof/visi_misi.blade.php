<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
s    <title>Visi dan Misi - SMAN 1 Balige</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom CSS for list styling -->
    <style>
        .content ul,
        .content ol {
            padding-left: 1.5rem;
            margin: 1rem 0;
        }

        .content ul {
            list-style-type: disc;
        }

        .content ol {
            list-style-type: decimal;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-white text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md mt-24">
        <h1 class="text-3xl font-bold">Visi & Misi SMA N 1 Balige</h1>
        <p class="mt-2">Mewujudkan Generasi Berprestasi Melalui Visi dan Misi yang Inspiratif</p>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white min-h-full">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Visi</h2>
            <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-lg mb-8">
                <div class="content text-gray-700 leading-relaxed">
                    {!! $basicInfo->visi ?? 'Visi belum tersedia.' !!}
                </div>
            </div>

            <h2 class="text-2xl font-bold text-gray-900 mb-6">Misi</h2>
            <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-lg">
                <div class="content text-gray-700 leading-relaxed">
                    {!! $basicInfo->misi ?? 'Misi belum tersedia.' !!}
                </div>
            </div>
        </div>
    </main>

    @include('layouts.header')

    @section('content')
    
    @endsection

    @include('layouts.footer')
</body>

</html>
