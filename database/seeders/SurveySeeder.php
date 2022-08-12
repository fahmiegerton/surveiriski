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

        $peranTIK = $survey->sections()->create(['name' => 'Peran TIK dalam Lingkungan Kampus']);
        $peranTIK->questions()->create([
            'content' => 'Total anggaran tahunan yang dialokasikan untuk ITK',
            'type' => 'radio',
            'options' => ['Minim', 'Rendah', 'Sedang', 'Tinggi', 'Kritis']
        ]);

        $peranTIK->questions()->create([
            'content' => 'Jumlah staff/pengguna dalam instansi yang menggunakan infrastruktur ITK',
            'type' => 'radio',
            'options' => ['Minim', 'Rendah', 'Sedang', 'Tinggi', 'Kritis']
        ]);

        $peranTIK->questions()->create([
            'content' => 'Tingkat ketergantungan terhadap layanan TIK untuk menjalankan tugas pokok',
            'type' => 'radio',
            'options' => ['Minim', 'Rendah', 'Sedang', 'Tinggi', 'Kritis']
        ]);

        $tataKelola = $survey->sections->create(['name' => 'Tata Kelola Keamanan Informasi']);
        $tataKelolaOptions = ['Tidak dilakukan', 'Dalam perencanaan', 'Dalam penerapan atau diterapkan sebagian', 'diterapkan secara menyeluruh'];

        $tataKelola->questions->create([
            'content' => 'Apakah pimpinan instansi Anda secara prinsip dan resmi bertanggung jawab terhadap pelaksanaan program keamanan informasi (misal yang tercantum dalam ITSP), termasuk penetapan kebijakan terkait?',
            'type' => 'radio',
            'options' => $tataKelolaOptions
        ]);

        $tataKelola->questions->create([
            'content' => 'Apakah instansi Anda memiliki fungsi atau bagian yang secara spesifik mempunyai tugas dan tanggung jawab mengelola informasi dan menjaga kepatuhannya?',,
            'type' => 'radio',
            'options' => $tataKelolaOptions
        ]);
    }
}
