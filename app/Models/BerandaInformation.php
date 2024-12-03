<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerandaInformation extends Model
{
    use HasFactory;

    protected $table = 'beranda_information';

    protected $fillable = [
        'kontak_phone',
        'kontak_email',
        'nama_lokasi',
        'alamat_lokasi',
        'peta_lokasi',
        'sosial_media_instagram',
        'sosial_media_youtube',
        'sosial_media_tiktok',
        'sosial_media_facebook',
        'sosial_media_twitter',
        'highlight',
        'sub_highlight',
        'cover',
        'judul_video',
        'link_video',
        'jumlah_peserta_didik',
        'jumlah_guru',
        'jumlah_kelas',
        'photo_kepala_sekolah',
        'nama_kepala_sekolah',
        'sambutan_kepala_sekolah'
    ];
}
