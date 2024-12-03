<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 1 Balige</title>

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Browser Icon -->
    <link rel="icon" href="/favicon.ico">

    <style>
        /* Submenu item hover background color */
        .dropdown-item {
            position: relative;
            padding-left: 2rem;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .dropdown-item:hover {
            background-color: #060268;
            color: #ffffff;
            /* Ensure text color remains white on hover */
        }

        .dropdown-item::before {
            content: "";
            position: absolute;
            left: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 2px;
            background-color: #ffffff;
            transition: width 0.3s ease-in-out;
        }

        .dropdown-item:hover::before {
            width: 20px;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg py-4 fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo Section -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('logo.png') }}" alt="Logo SMAN 1 Balige" class="w-12 h-12 rounded-full">
                <span class="text-2xl font-bold text-gray-800">SMAN 1 Balige</span>
            </div>

            <!-- Navigation Menu -->
            <div class="hidden md:flex space-x-8 items-center">

                <!-- Beranda Link -->
                <a href="{{ route('welcome') }}"
                    class="{{ request()->routeIs('welcome') ? 'text-[#075B98] font-semibold' : 'text-gray-800' }} hover:text-[#075B98] transition duration-200 ease-in-out">
                    Beranda
                </a>

                <!-- Informasi Dropdown Menu -->
                <div class="relative group">
                    <a href="#"
                        class="nav-button flex items-center {{ request()->routeIs('berita', 'galeri', 'arsip', 'hubungi') ? 'text-[#075B98] font-semibold' : 'text-gray-800' }} hover:text-[#075B98] transition duration-200 ease-in-out">
                        Informasi
                        <i
                            class="fas fa-chevron-down text-xs ml-1 transform rotate-0 transition-transform duration-200 group-hover:-rotate-180"></i>
                    </a>
                    <div
                        class="dropdown-menu absolute opacity-0 invisible transform scale-95 transition-all duration-300 ease-in-out bg-[#075B98] shadow-lg rounded-lg w-56 top-full left-0 z-10 origin-top group-hover:opacity-100 group-hover:visible group-hover:scale-100">
                        <a href="{{ route('berita') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] rounded-t-lg transition duration-150 ease-in-out transform hover:translate-x-2">
                            Berita &amp; Artikel
                        </a>
                        <a href="{{ route('galeri') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] transition duration-150 ease-in-out transform hover:translate-x-2">
                            Galeri
                        </a>
                        <a href="{{ route('arsip') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] transition duration-150 ease-in-out transform hover:translate-x-2">
                            Arsip
                        </a>
                        <a href="{{ route('hubungi') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] rounded-b-lg transition duration-150 ease-in-out transform hover:translate-x-2">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

                <!-- Profil Dropdown Menu -->
                <div class="relative group">
                    <a href="#"
                        class="nav-button flex items-center {{ request()->routeIs('prof.*') ? 'text-[#075B98] font-semibold' : 'text-gray-800' }} hover:text-[#075B98] transition duration-200 ease-in-out">
                        Profil
                        <i
                            class="fas fa-chevron-down text-xs ml-1 transform rotate-0 transition-transform duration-200 group-hover:-rotate-180"></i>
                    </a>
                    <div
                        class="dropdown-menu absolute opacity-0 invisible transform scale-95 transition-all duration-300 ease-in-out bg-[#075B98] shadow-lg rounded-lg w-56 top-full left-0 z-10 origin-top group-hover:opacity-100 group-hover:visible group-hover:scale-100">
                        <a href="{{ route('prof.sejarah') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] rounded-t-lg transition duration-150 ease-in-out transform hover:translate-x-2">
                            Sejarah
                        </a>
                        <a href="{{ route('prof.visi_misi') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] transition duration-150 ease-in-out transform hover:translate-x-2">
                            Visi &amp; Misi
                        </a>
                        <a href="{{ route('prof.struktur_organisasi') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] transition duration-150 ease-in-out transform hover:translate-x-2">
                            Struktur Organisasi
                        </a>
                        <a href="{{ route('prof.program_sekolah') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] transition duration-150 ease-in-out transform hover:translate-x-2">
                            Program Sekolah
                        </a>
                        <a href="{{ route('prof.staf_guru_karyawan') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] transition duration-150 ease-in-out transform hover:translate-x-2">
                            Staf Guru &amp; Karyawan
                        </a>
                        <a href="{{ route('prof.prestasi') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] transition duration-150 ease-in-out transform hover:translate-x-2">
                            Prestasi
                        </a>
                        <a href="{{ route('prof.alumni') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] rounded-b-lg transition duration-150 ease-in-out transform hover:translate-x-2">
                            Alumni
                        </a>
                    </div>
                </div>

                <!-- Sarana & Prasarana Dropdown Menu -->
                <div class="relative group">
                    <a href="#"
                        class="nav-button flex items-center text-gray-800 hover:text-[#075B98] transition duration-200 ease-in-out">
                        Sarana &amp; Prasarana
                        <i
                            class="fas fa-chevron-down text-xs ml-1 transform rotate-0 transition-transform duration-200 group-hover:-rotate-180"></i>
                    </a>
                    <div
                        class="dropdown-menu absolute opacity-0 invisible transform scale-95 transition-all duration-300 ease-in-out bg-[#075B98] shadow-lg rounded-lg w-56 top-full left-0 z-10 origin-top group-hover:opacity-100 group-hover:visible group-hover:scale-100">
                        @foreach($saranaItems as $sarana)
                            <a href="{{ route('sarana.show', $sarana->id) }}"
                                class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] rounded-lg transition duration-150 ease-in-out transform hover:translate-x-2">
                                {{ $sarana->nama }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Platform Kami Dropdown Menu -->
                <div class="relative group">
                    <a href="#"
                        class="nav-button flex items-center text-gray-800 hover:text-[#075B98] transition duration-200 ease-in-out">
                        Platform Kami
                        <i
                            class="fas fa-chevron-down text-xs ml-1 transform rotate-0 transition-transform duration-200 group-hover:-rotate-180"></i>
                    </a>
                    <div
                        class="dropdown-menu absolute opacity-0 invisible transform scale-95 transition-all duration-300 ease-in-out bg-[#075B98] shadow-lg rounded-lg w-56 top-full left-0 z-10 origin-top group-hover:opacity-100 group-hover:visible group-hover:scale-100">
                        @if($platforms->isNotEmpty())
                            @foreach($platforms as $platform)
                                <a href="{{ $platform->url }}" target="_blank"
                                    class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] transition duration-150 ease-in-out transform hover:translate-x-2">
                                    {{ $platform->name }}
                                </a>
                            @endforeach
                        @endif
                        <a href="{{ route('dashboard') }}"
                            class="dropdown-item relative text-white block px-4 py-3 hover:bg-[#075B98] rounded-lg transition duration-150 ease-in-out transform hover:translate-x-2">
                            SIS
                        </a>
                    </div>
                </div>

                <!-- Social Media Icons -->
                <div class="flex items-center space-x-4 ml-4">
                    @if($berandaInfo)
                        @if ($berandaInfo->sosial_media_instagram)
                            <a href="{{ $berandaInfo->sosial_media_instagram }}" target="_blank"
                                class="text-gray-600 hover:text-[#075B98] transition duration-150 ease-in-out">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if ($berandaInfo->sosial_media_youtube)
                            <a href="{{ $berandaInfo->sosial_media_youtube }}" target="_blank"
                                class="text-gray-600 hover:text-red-600 transition duration-150 ease-in-out">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif
                        @if ($berandaInfo->sosial_media_tiktok)
                            <a href="{{ $berandaInfo->sosial_media_tiktok }}" target="_blank"
                                class="text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        @endif
                        @if ($berandaInfo->sosial_media_facebook)
                            <a href="{{ $berandaInfo->sosial_media_facebook }}" target="_blank"
                                class="text-gray-600 hover:text-[#075B98] transition duration-150 ease-in-out">
                                <i class="fab fa-facebook"></i>
                            </a>
                        @endif
                        @if ($berandaInfo->sosial_media_twitter)
                            <a href="{{ $berandaInfo->sosial_media_twitter }}" target="_blank"
                                class="text-gray-600 hover:text-[#075B98] transition duration-150 ease-in-out">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                    @endif
                </div>

                <!-- PPDB Button -->
                <div class="ml-4">
                    <a href="{{ route('ppdb') }}"
                        class="{{ request()->routeIs('ppdb') ? 'text-[#075B98] font-semibold' : 'text-[#075B98]' }} px-6 py-2 border border-[#075B98] rounded-full hover:bg-[#075B98] hover:text-white transition duration-300">
                        PPDB
                    </a>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>