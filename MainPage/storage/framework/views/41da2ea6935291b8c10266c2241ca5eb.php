<!-- Footer Section -->
<div style="background-color: black; color: white; padding: 4rem 0;">
        <div
                style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; display: flex; flex-direction: row; gap: 1.5rem; align-items: start; justify-content: space-between;">

                <!-- Logo and Social Media -->
                <div style="display: flex; flex-direction: column; align-items: center; width: 33.33%;">
                        <img src="logo.png" alt="SMAN 1 Balige Logo"
                                style="width: 64px; height: 64px; margin-bottom: 1rem;">
                        <h1 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">SMAN 1 Balige</h1>
                        <div style="display: flex; gap: 1rem; justify-content: center;">
                                <a href="#" style="color: gray; transition: color 0.15s;"><i class="fab fa-instagram"
                                                style="font-size: 1rem;"></i></a>
                                <a href="#" style="color: gray; transition: color 0.15s;"><i class="fab fa-youtube"
                                                style="font-size: 1rem;"></i></a>
                                <a href="#" style="color: gray; transition: color 0.15s;"><i class="fab fa-facebook"
                                                style="font-size: 1rem;"></i></a>
                                <a href="#" style="color: gray; transition: color 0.15s;"><i class="fab fa-twitter"
                                                style="font-size: 1rem;"></i></a>
                                <a href="#" style="color: gray; transition: color 0.15s;"><i class="fab fa-tiktok"
                                                style="font-size: 1rem;"></i></a>
                        </div>
                </div>

                <!-- Links Section -->
                <div style="display: flex; width: 66.67%; gap: 2rem; justify-content: space-around;">
                        <!-- Profil Section -->
                        <div>
                                <h2 style="color: gray; font-weight: 600; margin-bottom: 1rem;">Profil</h2>
                                <ul style="list-style-type: none; padding: 0;">
                                        <li><a href="<?php echo e(route('prof.sejarah')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Sejarah</span></a></li>
                                        <li><a href="<?php echo e(route('prof.visi_misi')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Visi & Misi</span></a></li>
                                        <li><a href="<?php echo e(route('prof.struktur_organisasi')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Struktur Organisasi</span></a>
                                        </li>
                                        <li><a href="<?php echo e(route('prof.program_sekolah')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Program Sekolah</span></a>
                                        </li>
                                        <li><a href="<?php echo e(route('prof.staf_guru_karyawan')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Staf Guru &
                                                                Karyawan</span></a></li>
                                        <li><a href="<?php echo e(route('prof.prestasi')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Prestasi</span></a></li>
                                        <li><a href="<?php echo e(route('prof.alumni')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Alumni</span></a></li>
                                </ul>
                        </div>

                        <!-- Informasi Section -->
                        <div>
                                <h2 style="color: gray; font-weight: 600; margin-bottom: 1rem;">Informasi</h2>
                                <ul style="list-style-type: none; padding: 0;">
                                        <li><a href="<?php echo e(route('berita')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Berita & Artikel</span></a>
                                        </li>
                                        <li><a href="<?php echo e(route('galeri')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Galeri</span></a></li>
                                        <li><a href="<?php echo e(route('arsip')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Arsip</span></a></li>
                                        <li><a href="<?php echo e(route('hubungi')); ?>" class="footer-link"><i
                                                                class="fas fa-chevron-right text-xs"></i><span
                                                                class="footer-link-text"> Hubungi Kami</span></a></li>
                                </ul>
                        </div>

                        <!-- Platform Kami Section -->
                        <div>
                                <h2 style="color: gray; font-weight: 600; margin-bottom: 1rem;">Platform Kami</h2>
                                <a href="#" class="footer-link"><i class="fas fa-chevron-right text-xs"></i><span
                                                class="footer-link-text"> Platform Kami</span></a>
                        </div>
                </div>
        </div>

        <!-- Copyright Section -->
        <div style="background-color: black; color: white; text-align: center; padding: 1rem 0; margin-top: 2rem;">
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
</style><?php /**PATH D:\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/layouts/footer.blade.php ENDPATH**/ ?>