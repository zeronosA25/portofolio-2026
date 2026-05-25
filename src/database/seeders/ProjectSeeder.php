<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::updateOrCreate(
            ['slug' => 'website-portofolio'],
            [
                'title' => 'Website SiWorkout',
                'description' => 'Website ini merupakan website portofolio personal yang dibuat untuk menampilkan profil, kemampuan, dan project yang sedang dikembangkan oleh penulis. Website ini menyediakan beberapa halaman utama seperti Home/About, Showcase/Project, dan Contact. Pada halaman Showcase/Project, pengguna dapat melihat informasi mengenai laporan awal project akhir yang berisi judul project, deskripsi singkat, analisis masalah, kebutuhan sistem, teknologi yang digunakan, serta rancangan diagram sistem.
                Website ini dibuat secara dinamis sehingga data project, skill, dan pesan kontak dapat dikelola melalui halaman admin. Dengan adanya website ini, informasi mengenai profil dan perkembangan project dapat ditampilkan secara lebih terstruktur, profesional, dan mudah diakses.',
                'image' => 'images',
                'erd_image' => 'images',
                'flowchart_image' => 'images',
                'demo_url' => null,
                'github_url' => 'https://github.com/zeronosA25',
                'technologies' => ['Laravel', 'Filament v3', 'Livewire', 'Blade', 'MariaDB'],
                'is_published' => true,
            ]
        );
    }
}
