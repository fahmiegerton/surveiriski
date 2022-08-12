<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MattDaneshvar\Survey\Models\Survey;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //refrensi => https://github.com/matt-daneshvar/laravel-survey
        $survey = Survey::create(['name' => 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah', 'settings' => ['accept-guest-entries' => true]]);

        $general = $survey->sections()->create(['name' => 'Informasi Umum']);
        $general->questions()->create([
            'content' => 'Nama'
        ]);

        $general->questions()->create([
            'content' => 'Departemen/Divisi'
        ]);

        $general->questions()->create([
            'content' => 'Email'
        ]);

        $peranTIK = $survey->sections()->create(['name' => 'Peran TIK dalam Lingkungan Kampus']);
        $peranTIKOptions = ['Minim', 'Rendah', 'Sedang', 'Tinggi', 'Kritis'];
        $peranTIKQuestions = [
            'Total anggaran tahunan yang dialokasikan untuk ITK',
            'Jumlah staff/pengguna dalam instansi yang menggunakan infrastruktur ITK',
            'Tingkat ketergantungan terhadap layanan TIK untuk menjalankan tugas pokok',
            'Nilai kekayaan intelektual yang dimiliki dan dihasilkan oleh instansi Anda',
            'Dampak dari kegagalan sistem, TIK utama yang digunakan instansi Anda'
        ];

        foreach ($peranTIKQuestions as $q) {
            $peranTIK->questions()->create([
                'content' => $q,
                'type' => 'radio',
                'options' => $peranTIKOptions
            ]);
        }


        // ----------------------------------------------------------------------------

        $tataKelola = $survey->sections()->create(['name' => 'Tata Kelola Keamanan Informasi']);
        $tataKelolaOptions = ['Tidak dilakukan', 'Dalam perencanaan', 'Dalam penerapan atau diterapkan sebagian', 'diterapkan secara menyeluruh'];
        $tataKelolaQuestions = [
            'Apakah pimpinan instansi Anda secara prinsip dan resmi bertanggung jawab terhadap pelaksanaan program keamanan informasi (misal yang tercantum dalam ITSP), termasuk penetapan kebijakan terkait?',
            'Apakah instansi Anda memiliki fungsi atau bagian yang secara spesifik mempunyai tugas dan tanggung jawab mengelola informasi dan menjaga kepatuhannya?',
            'Apakah pejabat/petugas pelaksana pengamanan informasi mempunyai wewenang yang sesuai untuk menerapkan dan menjamin kepatuhan program keamanan informasi?',
            'Apakah penanggung jawab pelaksana pengamanan informasi mempunyai wewenang yang sesuai untuk menerapkan dan menjamin kepatuhan program keamanan informasi?',
            'Apakah peran pelaksana pengamanan informasi yang mencakup semua keperluan dipetakan dengan lengkap, termasuk kebutuhan audit internal dan persyaratan segregasi kewenangan?'
        ];

        foreach ($tataKelolaQuestions as $q) {
            $tataKelola->questions()->create([
                'content' => $q,
                'type' => 'radio',
                'options' => $tataKelolaOptions
            ]);
        }
        // ----------------------------------------------------------------------------

        $tataKelola = $survey->sections()->create(['name' => 'Tata Kelola Keamanan Informasi']);
        $tataKelolaOptions = ['Tidak dilakukan', 'Dalam perencanaan', 'Dalam penerapan atau diterapkan sebagian', 'diterapkan secara menyeluruh'];
        $tataKelolaQuestions = [
            'Apakah pimpinan instansi Anda secara prinsip dan resmi bertanggung jawab terhadap pelaksanaan program keamanan informasi (misal yang tercantum dalam ITSP), termasuk penetapan kebijakan terkait?',
            'Apakah instansi Anda memiliki fungsi atau bagian yang secara spesifik mempunyai tugas dan tanggung jawab mengelola informasi dan menjaga kepatuhannya?',
            'Apakah pejabat/petugas pelaksana pengamanan informasi mempunyai wewenang yang sesuai untuk menerapkan dan menjamin kepatuhan program keamanan informasi?',
            'Apakah penanggung jawab pelaksana pengamanan informasi mempunyai wewenang yang sesuai untuk menerapkan dan menjamin kepatuhan program keamanan informasi?',
            'Apakah peran pelaksana pengamanan informasi yang mencakup semua keperluan dipetakan dengan lengkap, termasuk kebutuhan audit internal dan persyaratan segregasi kewenangan?'
        ];

        foreach ($tataKelolaQuestions as $q) {
            $tataKelola->questions()->create([
                'content' => $q,
                'type' => 'radio',
                'options' => $tataKelolaOptions
            ]);
        }

        // ----------------------------------------------------------------------------

        $resikoKeamanan = $survey->sections()->create(['name' => 'Pengelolaan Risiko Keamanan Informasi']);
        $resikoKeamananOptions = ['Tidak dilakukan', 'Dalam perencanaan', 'Dalam penerapan atau diterapkan sebagian', 'diterapkan secara menyeluruh'];
        $resikoKeamananQuestions = [
            'Apakah instansi Anda mempunyai program kerja pengelolaan risiko keamanan informasi yang terdokumentasi dan secara resmi digunakan?',
            'Apakah instansi Anda mempunyai kerangka kerja pengelolaan risiko keamanan informasi yang terdokumentasi dan secara resmi digunakan?',
            'Apakah kerangka kerja pengelolaan risiko ini mencakup definisi dan hubungan tingkat klasifikasi aset informasi, tingkat ancaman, kemungkinan terjadinya ancaman tersebut dan dampak kerugian terhadap instansi Anda?',
            'Apakah instansi Anda sudah menetapkan ambang batas tingkat risiko yang dapat diterima?',
            'Apakah instansi ANda sudah mendefinisikan kepemilikan dan pihak pengelola (custodian) aset informasi yang ada, termasuk aset utama/penting dan proses kerja utama yang menggunakan aset tersebut?'
        ];

        foreach ($resikoKeamananQuestions as $q) {
            $resikoKeamanan->questions()->create([
                'content' => $q,
                'type' => 'radio',
                'options' => $resikoKeamananOptions
            ]);
        }


        // ----------------------------------------------------------------------------

        $kkKelolaKeamanan = $survey->sections()->create(['name' => 'Kerangka Kerja Pengelolaan Keamanan Informasi']);
        $kkKelolaKeamananOptions = ['Tidak dilakukan', 'Dalam perencanaan', 'Dalam penerapan atau diterapkan sebagian', 'diterapkan secara menyeluruh'];
        $kkKelolaKeamananQuestions = [
            'Apakah kebijakan danprosedur keamanan informasi sudah disusun dan dituliskan dengan jelas, dengan mencantumkan peran dan tanggung jawab pihak-pihak yang diberikan wewenang untuk menerapkannya?',
            'Apakah kebijakan keamanan informasi sudah ditetapkan secara formal, dipublikasikan kepada pihak terkait dan dengan mudah diakses oleh pihak yang membutuhkannya?',
            'Apakah tersedia mekanisme untuk mengelola dokumen kebijakan dan prosedur keananan informasi, termasuk penggunaan daftar induk, distribusi, penarikan dari peredaran dan penyimpanannya?',
            'Apakah tersedia mekanisme untuk mengkomunikasikan kebijakan keamanan informasi (dan perubahannya) kepada semua pihak terkait, termasuk pihak ketiga?',
            'Apakah keseluruhan kebijakan dan prosedur keamanan informasi yang ada merefleksikan kebutuhan mitigasi dari hasil kajian resiko keamanan informasi?'
        ];

        foreach ($kkKelolaKeamananQuestions as $q) {
            $kkKelolaKeamanan->questions()->create([
                'content' => $q,
                'type' => 'radio',
                'options' => $kkKelolaKeamananOptions
            ]);
        }

        // ----------------------------------------------------------------------------

        $kelolaAset = $survey->sections()->create(['name' => 'Pengelola Aset Informasi']);
        $kelolaAsetOptions = ['Tidak dilakukan', 'Dalam perencanaan', 'Dalam penerapan atau diterapkan sebagian', 'diterapkan secara menyeluruh'];
        $kelolaAsetQuestions = [
            'Apakah tersedia daftar inventaris aset informasi yang lengkap?',
            'Apakah tersedia proses yang mengevaluasi dan mengklasifikasi aset informasi sesuai tingkat kepentingan aset bagi instansi dan keperluan pengamanannya?',
            'Apakah tersedia definisi tingkatan akses yang berbeda dan matrix yang merekam alokasi akses tersebut?',
            'Apakah tersedia proses pengelolaan perubahan terhadap sistem (termasuk perubahan konfigurasi) yang diterapkan secara konsisten?',
            'Apakah tersedia proses pengelolaan konfigurasi yang diterapkan secara konsisten?'
        ];

        foreach ($kelolaAsetQuestions as $q) {
            $kelolaAset->questions()->create([
                'content' => $q,
                'type' => 'radio',
                'options' => $kelolaAsetOptions
            ]);
        }

        // ----------------------------------------------------------------------------

        $teknologiKI = $survey->sections()->create(['name' => 'Teknologi dan Keamanan Informasi']);
        $teknologiKIOptions = ['Tidak dilakukan', 'Dalam perencanaan', 'Dalam penerapan atau diterapkan sebagian', 'diterapkan secara menyeluruh'];
        $teknologiKIQuestions = [
            'Apakah layanan TIK (sistem komputer) yang menggunakan internet sudah dilindungi dengan lebih dari 1 lapis pengamanan?',
            'Apakah jaringan komunikasi disegmentasi sesuai dengan kepentingannya (pembagian instansi, kebutuhan aplikasi, jalur akses khusus, dll)?',
            'Apakah tersedia konfigurasi standar untuk keamanan sistem bagi keseluruhan aset komputer dan perangkat jaringan, yang dimutakhirkan sesuai perkembangan dan kebutuhan?',
            'Apakah instansi Anda secara rutin menganalisa kepatuhan penerapan konfigurasi standar yang ada?',
            'Apakah jaringan, sistem dan aplikasi yang digunakan secara rutin dipindai untuk mengidentifikasi kemungkinan adanya celah kelemahan atau perubahan/keutuhan konfigurasi?'
        ];

        foreach ($teknologiKIQuestions as $q) {
            $teknologiKI->questions()->create([
                'content' => $q,
                'type' => 'radio',
                'options' => $teknologiKIOptions
            ]);
        }
    }
}
