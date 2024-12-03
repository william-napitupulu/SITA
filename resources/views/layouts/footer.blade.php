<!-- Footer Section -->
<div style="background-color: black; color: white; padding-top: 4rem;">
        <div
                style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; display: flex; flex-direction: row; gap: 1.5rem; align-items: start; justify-content: space-between;">

                <!-- Logo and Social Media -->
                <div style="display: flex; flex-direction: column; align-items: center; width: 33.33%;">
                        <img src="{{ asset('logo.png') }}" alt="SMAN 1 Balige Logo"
                                style="width: 64px; height: 64px; margin-bottom: 1rem;">
                        <h1 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">SMAN 1 Balige</h1>

                        <!-- Displaying the Address Below the Title -->
                        <p style="color: gray; font-size: 0.875rem; text-align: center; margin-bottom: 1rem;">
                                {{ $berandaInfo->alamat_lokasi ?? 'Alamat tidak tersedia' }}
                        </p>

                        <div style="display: flex; gap: 1rem; justify-content: center;">
                                @if($berandaInfo)
                                                                        @if ($berandaInfo->sosial_media_instagram)
                                                                                                                                                        <a href="{{ $berandaInfo->sosial_media_instagram }}" target="_blank"
                                                                                                                                                                                        class="text-gray-600 hover:text-blue-600 transition duration-150 ease-in-out">
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
                                                                                                                                                                                        class="text-gray-600 hover:text-blue-800 transition duration-150 ease-in-out">
                                                                                                                                                                                        <i class="fab fa-facebook"></i>
                                                                                                                                                        </a>
                                                                                                                                                @endif
                                                                        @if ($berandaInfo->sosial_media_twitter)
                                                                                                                                                        <a href="{{ $berandaInfo->sosial_media_twitter }}" target="_blank"
                                                                                                                                                                                        class="text-gray-600 hover:text-blue-400 transition duration-150 ease-in-out">
                                                                                                                                                                                        <i class="fab fa-twitter"></i>
                                                                                                                                                        </a>
                                                                                                                                                @endif
                                                                @endif
                        </div>
                </div>


                <!-- Links Section -->
                <div style="display: flex; width: 66.67%; gap: 2rem; justify-content: space-around;">
                        <!-- Profil Section -->
                        <div>
                                <h2 style="color: gray; font-weight: 600; margin-bottom: 1rem;">Profil</h2>
                                <ul style="list-style-type: none; padding: 0;">
                                        <li><a href="{{ route('prof.sejarah') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Sejarah</span></a></li>
                                        <li><a href="{{ route('prof.visi_misi') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Visi & Misi</span></a></li>
                                        <li><a href="{{ route('prof.struktur_organisasi') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Struktur Organisasi</span></a>
                                        </li>
                                        <li><a href="{{ route('prof.program_sekolah') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Program Sekolah</span></a>
                                        </li>
                                        <li><a href="{{ route('prof.staf_guru_karyawan') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Staf Guru &
                                                                Karyawan</span></a></li>
                                        <li><a href="{{ route('prof.prestasi') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Prestasi</span></a></li>
                                        <li><a href="{{ route('prof.alumni') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Alumni</span></a></li>
                                </ul>
                        </div>

                        <!-- Informasi Section -->
                        <div>
                                <h2 style="color: gray; font-weight: 600; margin-bottom: 1rem;">Informasi</h2>
                                <ul style="list-style-type: none; padding: 0;">
                                        <li><a href="{{ route('berita') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Berita & Artikel</span></a>
                                        </li>
                                        <li><a href="{{ route('galeri') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Galeri</span></a></li>
                                        <li><a href="{{ route('arsip') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Arsip</span></a></li>
                                        <li><a href="{{ route('hubungi') }}" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Hubungi Kami</span></a></li>
                                </ul>
                        </div>

                        <!-- Platform Kami Section -->
                        <div>
                                <h2 style="color: gray; font-weight: 600; margin-bottom: 1rem;">Platform Kami</h2>
                                <ul style="list-style-type: none; padding: 0;">
                                        <!-- Dynamic Platforms -->
                                        @if(isset($platforms) && $platforms->isNotEmpty())
                                                                                        @foreach($platforms as $platform)
                                                                                                                                                                                        <li>
                                                                                                                                                                                                                        <a href="{{ $platform->url }}" target="_blank" class="footer-link">
                                                                                                                                                                                                                                                        <i class="fas fa-chevron-right text-xs"></i>
                                                                                                                                                                                                                                                        <span class="footer-link-text"> {{ $platform->name }}</span>
                                                                                                                                                                                                                        </a>
                                                                                                                                                                                        </li>
                                                                                                                                                                                @endforeach
                                                                                @endif

                                        <!-- SIS Link -->
                                        <li>
                                                <a href="{{ route('dashboard') }}" class="footer-link">
                                                        <i class="fas fa-chevron-right text-xs"></i>
                                                        <span class="footer-link-text"> SIS</span>
                                                </a>
                                        </li>

                                        @if(!isset($platforms) || $platforms->isEmpty())
                                                                                        <li style="color: gray;"></li>
                                                                                @endif
                                </ul>
                        </div>


                </div>
        </div>

        <!-- Contact Information Section with hyperlinks -->
        <div style="background-color: black; color: white; text-align: center; padding: 1.5rem 0;">
                <p style="display: flex; justify-content: center; gap: 1.5rem;">
                        <!-- Phone Number as clickable tel link -->
                        <span>
                                <a href="tel:{{ $berandaInfo->kontak_phone ?? 'N/A' }}"
                                        style="color: white; text-decoration: none;">
                                        <i class="fas fa-phone"></i>
                                        {{ $berandaInfo->kontak_phone ?? 'No phone available' }}
                                </a>
                        </span>
                        <!-- Email as clickable mailto link -->
                        <span>
                                <a href="mailto:{{ $berandaInfo->kontak_email ?? 'N/A' }}"
                                        style="color: white; text-decoration: none;">
                                        <i class="fas fa-envelope"></i>
                                        {{ $berandaInfo->kontak_email ?? 'No email available' }}
                                </a>
                        </span>
                        <!-- Location link to map if provided, otherwise shows address -->
                        <span>
                                @if(isset($berandaInfo->peta_lokasi) && $berandaInfo->peta_lokasi)
                                                                        <a href="{{ $berandaInfo->peta_lokasi }}" target="_blank"
                                                                                        style="color: white; text-decoration: none;">
                                                                                        <i class="fas fa-map-marker-alt"></i> {{ $berandaInfo->nama_lokasi }}
                                                                        </a>
                                                                @else
                                                                                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                                                                                        {{ $berandaInfo->nama_lokasi ?? 'No location available' }},
                                                                                                                                        {{ $berandaInfo->alamat_lokasi ?? 'No address available' }}
                                                                                                                                @endif
                        </span>
                </p>
        </div>



        <!-- Copyright Section -->
        <div style="background-color: #3333; color: white; text-align: center; padding: 1rem 0; margin-top: 2rem;">
                <p>Copyright &copy; <a href="#" style="color: teal; transition: color 0.15s;">2024 SMAN 1 Balige</a></p>
        </div>
</div>

<!-- Custom CSS for Footer Links -->
<style>
        /* Link styling */
        .footer-link {
                color: white;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
        }

        /* Underline animation for text only */
        .footer-link-text {
                position: relative;
                transition: color 0.2s;
        }

        .footer-link-text::after {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 0;
                height: 2px;
                width: 0;
                background-color: white;
                transition: width 0.2s ease-in-out;
        }

        /* Hover effect for link underline */
        .footer-link:hover .footer-link-text::after {
                width: 100%;
        }
</style>