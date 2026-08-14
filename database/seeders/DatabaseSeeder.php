<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Alumni;
use App\Models\Fasilitas;
use App\Models\Jurusan;
use App\Models\Pendidik;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with dummy/placeholder content only.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sim-sekolah.test',
            'password' => bcrypt('admin123'),
        ]);

        $jurusanList = [
            ['nama' => 'Teknik Komputer dan Jaringan', 'singkatan' => 'TKJ', 'deskripsi' => 'Program keahlian yang membekali siswa dengan kompetensi instalasi jaringan, administrasi server, dan keamanan sistem komputer.'],
            ['nama' => 'Rekayasa Perangkat Lunak', 'singkatan' => 'RPL', 'deskripsi' => 'Program keahlian yang fokus pada pengembangan aplikasi desktop, web, dan mobile menggunakan berbagai bahasa pemrograman modern.'],
            ['nama' => 'Teknik Kendaraan Ringan', 'singkatan' => 'TKR', 'deskripsi' => 'Program keahlian yang mempelajari perawatan, perbaikan, dan diagnosis kerusakan kendaraan bermotor roda empat.'],
            ['nama' => 'Manajemen Perkantoran', 'singkatan' => 'MP', 'deskripsi' => 'Program keahlian yang membekali siswa dengan kompetensi administrasi, kearsipan, dan tata kelola perkantoran modern.'],
            ['nama' => 'Teknik Kapal Niaga', 'singkatan' => 'TKN', 'deskripsi' => 'Program keahlian yang mempersiapkan siswa untuk bekerja di industri maritim dan pelayaran niaga.'],
            ['nama' => 'Akuntansi dan Keuangan Lembaga', 'singkatan' => 'AKL', 'deskripsi' => 'Program keahlian yang membekali siswa dengan kompetensi pencatatan keuangan, perpajakan, dan pelaporan akuntansi.'],
        ];
        foreach ($jurusanList as $j) {
            Jurusan::create($j);
        }

        $pendidikList = [
            ['nip' => '198001012010011001', 'nama' => 'Budi Santoso, S.Kom', 'jabatan' => 'Kepala Sekolah'],
            ['nip' => '198203152011012002', 'nama' => 'Siti Rahmawati, S.Pd', 'jabatan' => 'Wakil Kepala Sekolah'],
            ['nip' => '198507202012011003', 'nama' => 'Ahmad Fauzi, S.T', 'jabatan' => 'Kepala Program TKJ'],
            ['nip' => '199001102015012004', 'nama' => 'Dewi Lestari, S.Kom', 'jabatan' => 'Guru Produktif RPL'],
            ['nip' => '198711052013011005', 'nama' => 'Hendra Gunawan, S.T', 'jabatan' => 'Kepala Program TKR'],
            ['nip' => '199203182016012006', 'nama' => 'Rina Marlina, S.Pd', 'jabatan' => 'Guru Produktif Manajemen Perkantoran'],
        ];
        foreach ($pendidikList as $p) {
            Pendidik::create($p);
        }

        $fasilitasList = [
            ['nama' => 'Laboratorium Komputer', 'deskripsi' => 'Ruang laboratorium dengan 40 unit komputer terkoneksi internet untuk praktik jaringan dan pemrograman.'],
            ['nama' => 'Bengkel Otomotif', 'deskripsi' => 'Bengkel praktik dengan peralatan diagnosa kendaraan dan unit kendaraan untuk pembelajaran teknik kendaraan ringan.'],
            ['nama' => 'Perpustakaan', 'deskripsi' => 'Ruang baca dengan koleksi buku pelajaran, referensi teknik, dan area diskusi siswa.'],
            ['nama' => 'Aula Serbaguna', 'deskripsi' => 'Ruang aula yang digunakan untuk kegiatan upacara, seminar, dan acara sekolah lainnya.'],
        ];
        foreach ($fasilitasList as $f) {
            Fasilitas::create($f);
        }

        $pengumumanList = [
            ['judul' => 'Pendaftaran Peserta Didik Baru Tahun Ajaran 2026/2027', 'isi' => "Diberitahukan kepada calon peserta didik baru bahwa pendaftaran akan dibuka mulai bulan Juni 2026. Silakan mempersiapkan berkas persyaratan yang diperlukan.\n\nInformasi lebih lanjut dapat menghubungi bagian tata usaha sekolah.", 'tanggal' => now()->subDays(2)],
            ['judul' => 'Jadwal Ujian Tengah Semester Ganjil', 'isi' => "Ujian Tengah Semester Ganjil akan dilaksanakan mulai tanggal 15 September 2026. Seluruh siswa diharapkan hadir tepat waktu dan membawa perlengkapan ujian.", 'tanggal' => now()->subDays(5)],
            ['judul' => 'Libur Hari Raya', 'isi' => "Sehubungan dengan Hari Raya, kegiatan belajar mengajar diliburkan sesuai kalender akademik. Kegiatan belajar akan kembali normal setelah masa libur berakhir.", 'tanggal' => now()->subDays(10)],
            ['judul' => 'Pelaksanaan Praktik Kerja Lapangan (PKL)', 'isi' => "Program Praktik Kerja Lapangan bagi siswa kelas XI akan dimulai bulan depan. Daftar mitra industri dapat dilihat di papan pengumuman sekolah.", 'tanggal' => now()->subDays(14)],
        ];
        foreach ($pengumumanList as $p) {
            Pengumuman::create($p);
        }

        $agendaList = [
            ['judul' => 'Upacara Bendera Hari Senin', 'deskripsi' => 'Upacara bendera rutin diikuti seluruh siswa dan guru.', 'tanggal' => now()->addDays(3), 'lokasi' => 'Lapangan Sekolah'],
            ['judul' => 'Lomba Kompetensi Siswa (LKS) Tingkat Kota', 'deskripsi' => 'Perwakilan siswa mengikuti Lomba Kompetensi Siswa tingkat Kota Harapan Baru.', 'tanggal' => now()->addDays(10), 'lokasi' => 'Gedung Serbaguna Kota Harapan Baru'],
            ['judul' => 'Rapat Orang Tua Siswa', 'deskripsi' => 'Rapat koordinasi antara pihak sekolah dan orang tua/wali siswa kelas X.', 'tanggal' => now()->addDays(15), 'lokasi' => 'Aula Sekolah'],
            ['judul' => 'Kunjungan Industri', 'deskripsi' => 'Kunjungan siswa jurusan RPL dan TKJ ke perusahaan teknologi mitra sekolah.', 'tanggal' => now()->addDays(21), 'lokasi' => 'Kawasan Industri Harapan Baru'],
        ];
        foreach ($agendaList as $a) {
            Agenda::create($a);
        }

        $jurusanId = fn (string $singkatan) => Jurusan::where('singkatan', $singkatan)->value('id');

        $alumniList = [
            ['nama' => 'Rangga Saputra', 'tahun_lulus' => 2020, 'jurusan_id' => $jurusanId('TKJ'), 'pekerjaan' => 'Network Engineer', 'perusahaan' => 'PT Jaringan Nusantara', 'kota' => 'Jakarta', 'lat' => -6.2088, 'lng' => 106.8456],
            ['nama' => 'Melati Anggraini', 'tahun_lulus' => 2021, 'jurusan_id' => $jurusanId('RPL'), 'pekerjaan' => 'Frontend Developer', 'perusahaan' => 'PT Digital Kreasi Bangsa', 'kota' => 'Bandung', 'lat' => -6.9175, 'lng' => 107.6191],
            ['nama' => 'Fajar Nugroho', 'tahun_lulus' => 2019, 'jurusan_id' => $jurusanId('TKR'), 'pekerjaan' => 'Mekanik Senior', 'perusahaan' => 'Bengkel Mitra Otomotif', 'kota' => 'Surabaya', 'lat' => -7.2575, 'lng' => 112.7521],
            ['nama' => 'Intan Permatasari', 'tahun_lulus' => 2022, 'jurusan_id' => $jurusanId('MP'), 'pekerjaan' => 'Staff Administrasi', 'perusahaan' => 'PT Cipta Karya Sejahtera', 'kota' => 'Yogyakarta', 'lat' => -7.7956, 'lng' => 110.3695],
            ['nama' => 'Bayu Prasetyo', 'tahun_lulus' => 2018, 'jurusan_id' => $jurusanId('TKN'), 'pekerjaan' => 'Mualim Kapal Niaga', 'perusahaan' => 'PT Pelayaran Samudra Timur', 'kota' => 'Makassar', 'lat' => -5.1477, 'lng' => 119.4327],
            ['nama' => 'Citra Wulandari', 'tahun_lulus' => 2021, 'jurusan_id' => $jurusanId('AKL'), 'pekerjaan' => 'Staff Akuntansi', 'perusahaan' => 'PT Keuangan Abadi', 'kota' => 'Medan', 'lat' => 3.5952, 'lng' => 98.6722],
            ['nama' => 'Dimas Ardiansyah', 'tahun_lulus' => 2023, 'jurusan_id' => $jurusanId('RPL'), 'pekerjaan' => 'Mobile Developer', 'perusahaan' => 'PT Aplikasi Anak Bangsa', 'kota' => 'Denpasar', 'lat' => -8.6705, 'lng' => 115.2126],
            ['nama' => 'Sarah Amelia', 'tahun_lulus' => 2020, 'jurusan_id' => $jurusanId('TKJ'), 'pekerjaan' => 'IT Support', 'perusahaan' => 'PT Solusi Teknologi Kalimantan', 'kota' => 'Balikpapan', 'lat' => -1.2379, 'lng' => 116.8529],
        ];
        foreach ($alumniList as $a) {
            Alumni::create($a);
        }
    }
}
