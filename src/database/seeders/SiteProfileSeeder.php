<?php

namespace Database\Seeders;

use App\Models\SiteProfile;
use Illuminate\Database\Seeder;

class SiteProfileSeeder extends Seeder
{
    public function run(): void
    {
        SiteProfile::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Portofolio',

                'hero_subtitle' => 'Mahasiswa Esa Unggul',
                'hero_title' => 'Muhammad Aditya Teknik Informatika',
                'hero_description' => 'Saya Mahasiswa angkatan 24 dari Fakultas Ilmu Komputer Prodi Teknik Informatika yang sedang mendalami Full Stack Engineer.',
                'hero_button_text' => 'Lihat Tugas',

                'about_title' => 'Tentang Saya',
                'about_image' => null,
                'about_heading' => 'Data Diri Muhammad Aditya',
                'about_description_1' => 'Saya Mahasiswa angkatan 24 dari Fakultas Ilmu Komputer Prodi Teknik Informatika yang sedang mendalami Full Stack Engineer.',
                'about_description_2' => 'Saat ini saya sedang berusaha memahami lebih dalam tentang pengembangan website, backend, frontend, dan database.',
                'about_description_3' => 'Semoga bisa terus berkembang dan menjadi developer yang lebih baik lagi.',

                'skills' => [
                    'Laravel',
                    'Filament v3',
                    'Livewire',
                    'Blade',
                    'MariaDB',
                    'Docker',
                ],
            ]
        );
    }
}
