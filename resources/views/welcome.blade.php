<!DOCTYPE html>
<html lang="en">

<head>
    <!-- [Head content remains unchanged] -->
    <style>
        /* Floating animation for text elements */
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* Apply the float animation to text */
        .float-text {
            animation: float 1.5s ease-in-out infinite;
        }

        /* Styles for the circular play button with ripple effect */
        .play-button {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            font-weight: bold;
            color: #1f2937;
            /* Dark gray text color */
            position: relative;
        }

        /* Ripple effect animation applied directly to the icon */
        .play-button-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #d1d5db;
            /* Light gray background */
            margin-right: 8px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        /* Inner filled ripple effect */
        .play-button-icon::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: rgba(29, 78, 216, 0.3);
            /* Blue ripple color */
            animation: ripple 1.5s infinite;
            z-index: 0;
        }

        /* Outer ring ripple effect */
        .play-button-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid rgba(29, 78, 216, 0.3);
            /* Blue ring color */
            animation: ripple-ring 1.5s infinite;
            z-index: 0;
        }

        /* Triangle for play icon */
        .play-button-icon span {
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 10px solid #1f2937;
            /* Dark gray color for the triangle */
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            position: relative;
            z-index: 2;
        }

        /* Inner filled ripple keyframes */
        @keyframes ripple {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(1.5);
                opacity: 0;
            }
        }

        /* Outer ring ripple keyframes */
        @keyframes ripple-ring {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(1.7);
                opacity: 0;
            }
        }


        .kepala-sekolah-section {
            background-color: #f9fafb;
            /* Light gray background */
        }

        .kepala-sekolah-image img {
            width: 200px;
            /* Adjust as needed */
            height: auto;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .kepala-sekolah-name {
            font-size: 1rem;
            /* text-base */
            color: #374151;
            /* Dark gray for visibility */
            text-align: center;
        }

        .kepala-sekolah-title {
            font-size: 0.875rem;
            /* text-sm */
            color: #6b7280;
            /* Light gray */
            text-align: center;
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <!-- Base Information: Greeting Section -->
    <div class="relative bg-gradient-to-r from-blue-50 to-blue-100 py-16 flex items-center justify-center mt-24">
        <div class="w-11/12 md:w-3/4 lg:w-2/3 xl:w-3/5 bg-white rounded-lg shadow-lg p-10">
            <!-- Row with Text and Image Side-by-Side -->
            <div class="flex items-start space-x-8">
                <!-- Text Section aligned to the left -->
                <div class="w-1/2 space-y-4 text-left">
                    @if($berandaInfo && $berandaInfo->highlight)
                        <h1 class="text-4xl font-bold text-gray-800">{{ $berandaInfo->highlight }}</h1>
                    @endif
                    @if($berandaInfo && $berandaInfo->sub_highlight)
                        <p class="text-gray-600">{{ $berandaInfo->sub_highlight }}</p>
                    @endif
                    @if($berandaInfo && $berandaInfo->judul_video && $berandaInfo->link_video)
                        <a href="{{ $berandaInfo->link_video }}" class="play-button">
                            <span class="play-button-icon">
                                <span></span> <!-- Triangle Play Icon -->
                            </span>
                            <span><u>{{ $berandaInfo->judul_video }}</u></span>
                        </a>
                    @endif
                </div>

                <!-- Image Section aligned to the right -->
                <div class="w-1/2 flex justify-end">
                    @if($berandaInfo && $berandaInfo->cover)
                        <img src="{{ asset('storage/' . $berandaInfo->cover) }}" alt="Cover Image"
                            style="width: 350px; height: auto; object-fit: cover;" class="rounded-md shadow-md">
                    @else
                        <div class="w-80 h-80 bg-gray-200 rounded-full flex items-center justify-center text-gray-500">
                            <i class="fas fa-image fa-4x"></i>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Statistics Section aligned to the left like the text section -->
            <div class="mt-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left justify-items-start">
                    <!-- Jumlah Peserta Didik -->
                    <div class="bg-white rounded-lg p-6 text-left shadow-lg">
                        <p class="text-3xl font-bold float-text" style="color: #060268;">
                            {{ $berandaInfo->jumlah_peserta_didik ?? 'N/A' }}+
                        </p>
                        <p class="text-gray-600 float-text">Peserta Didik</p>
                    </div>

                    <!-- Jumlah Guru -->
                    <div class="bg-white rounded-lg p-6 text-left shadow-lg">
                        <p class="text-3xl font-bold float-text" style="color: #060268;">
                            {{ $berandaInfo->jumlah_guru ?? 'N/A' }}+
                        </p>
                        <p class="text-gray-600 float-text">Guru & Tendik</p>
                    </div>

                    <!-- Jumlah Kelas -->
                    <div class="bg-white rounded-lg p-6 text-left shadow-lg">
                        <p class="text-3xl font-bold float-text" style="color: #060268;">
                            {{ $berandaInfo->jumlah_kelas ?? 'N/A' }}+
                        </p>
                        <p class="text-gray-600 float-text">Kelas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kepala Sekolah Section -->
    <div class="relative bg-gradient-to-r from-blue-50 to-blue-100 py-16 flex items-center justify-center mt-24">
        <!-- Container for the content to make it responsive -->
        <div
            class="w-11/12 md:w-3/4 lg:w-2/3 xl:w-3/5 bg-white rounded-lg shadow-lg p-10 flex items-center space-x-8 mt-24">
            <!-- Image and Text Wrapper for Kepala Sekolah -->
            <div class="kepala-sekolah-image w-1/2 flex-shrink-0 flex flex-col items-center">
                @if($berandaInfo && $berandaInfo->photo_kepala_sekolah)
                    <!-- Image -->
                    <img src="{{ asset('storage/' . $berandaInfo->photo_kepala_sekolah) }}" alt="Photo of Kepala Sekolah"
                        style="width: 500px; height: auto; object-fit: cover;" class="rounded-lg shadow-lg">
                    <!-- Name and Title Below the Image -->
                    <div class="kepala-sekolah-name font-semibold mt-4 text-gray-700 text-lg text-center">
                        {{ $berandaInfo->nama_kepala_sekolah ?? 'Name not available' }}
                    </div>
                    <div class="kepala-sekolah-title text-center text-gray-500 text-base mt-1">(Kepala Sekolah)</div>
                @else
                    <div class="w-96 h-96 bg-gray-200 rounded-full flex items-center justify-center text-gray-500">
                        <i class="fas fa-image fa-6x"></i>
                    </div>
                @endif
            </div>

            <!-- Content for Kepala Sekolah -->
            <div class="kepala-sekolah-content w-2/3">
                <h2 class="text-3xl font-bold text-gray-800">Sambutan Kepala Sekolah</h2>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    {{ $berandaInfo->sambutan_kepala_sekolah ?? 'Content not available' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Prestasi Section -->
    <div class="relative bg-gradient-to-r from-blue-50 to-blue-100 py-16 flex items-center justify-center mt-24">
        <div class="w-11/12 md:w-3/4 lg:w-2/3 xl:w-3/5 bg-white rounded-lg shadow-lg p-10">
            <!-- Section Title and More Button -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Pencapaian Terbaru</h2>
                <a href="{{ route('prof.prestasi') }}" class="inline-flex items-center text-blue-600 font-semibold">
                    Selengkapnya →
                </a>
            </div>

            <!-- Prestasi Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($prestasi as $item)
                    <div class="bg-white rounded-lg shadow-lg p-4">
                        <!-- Image Cover -->
                        <div class="w-full h-48 bg-gray-200 rounded-md overflow-hidden">
                            @if($item->cover)
                                <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <i class="fas fa-image fa-3x"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Year and Title -->
                        <div class="mt-4 text-center">
                            <p class="text-sm text-gray-500">
                                <i class="far fa-calendar-alt"></i> {{ $item->tahun_perolehan }}
                            </p>
                            <h3 class="text-xl font-semibold text-gray-800 mt-2">{{ $item->judul }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


<!-- Berita Section -->
<div class="relative bg-gradient-to-r from-blue-50 to-blue-100 py-16 flex items-center justify-center mt-24">
    <div class="w-11/12 md:w-3/4 lg:w-2/3 xl:w-3/5 bg-white rounded-lg shadow-lg p-10">
        <!-- Section Title and More Button -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Berita Terbaru</h2>
            <a href="{{ route('berita') }}" class="inline-flex items-center text-blue-600 font-semibold">
                Selengkapnya →
            </a>
        </div>

            <!-- Berita Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($berita as $item)
                    <div class="bg-white rounded-lg shadow-lg p-4">
                        <!-- Image Cover -->
                        <div class="w-full h-48 bg-gray-200 rounded-md overflow-hidden">
                            @if($item->cover)
                                <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <i class="fas fa-image fa-3x"></i>
                                </div>
                            @endif
                        </div>

                    <!-- Year and Title -->
                    <div class="mt-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2">
                            <i class="far fa-calendar-alt"></i> {{ $item->created_at->format('d M Y') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Alumni Section -->
<div class="relative bg-gradient-to-r from-blue-50 to-blue-100 py-16 flex justify-center mt-24">
    <div class="w-11/12 md:w-3/4 lg:w-2/3 xl:w-3/5 bg-white rounded-lg shadow-lg p-10">
        <!-- Button to More -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Testimoni Alumni</h2>
            <a href="{{ route('prof.alumni') }}" class="inline-flex items-center text-blue-600 font-semibold">
                Selengkapnya →
            </a>
        </div>

        <!-- Testimonial Section -->
<div class="space-y-6">
    @foreach ($alumni as $item)
        <!-- Single Testimonial Container -->
        <div class="bg-gradient-to-r from-blue-100 to-blue-200 rounded-lg shadow-lg py-10 px-10 flex items-center">
            <!-- Alumni Info (Photo, Name, Year) -->
            <div class="flex-shrink-0 flex items-center space-x-4 ml-4">
                <div class="w-16 h-16 bg-gray-300 rounded-full overflow-hidden">
                    @if($item->photo)
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->nama }}"
                            class="w-full h-full object-cover">
                    @else
                        <div class="flex items-center justify-center h-full text-gray-400">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    @endif
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700">{{ $item->nama }}</p>
                    <p class="text-sm text-gray-500">Lulus: {{ $item->tahun_lulus }}</p>
                </div>
            </div>

            <!-- Testimonial Text -->
            <div class="ml-15 flex-grow text-center">
                <p class="text-gray-800 text-lg italic font-medium max-w-5xl">
                    "{{ $item->testimonial }}"
                </p>
            </div>
        </div>
                 @endforeach
            </div>
        </div>
</div>



    
    @section('content')
    @endsection

    @include('layouts.footer')
</body>

</html>