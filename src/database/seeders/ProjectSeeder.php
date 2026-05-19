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
                'title' => 'Website Portofolio',
                'description' => 'Saya Mahasiswa angkatan 24 dari fakultas Ilmu Komputer Prodi Teknik Informatika yang sedang mendalami Full Stack Enginer',
                'image' => 'images/Adit.JPG',
                'erd_image' => 'images/ERD.png',
                'flowchart_image' => 'images/FlowChart.png',
                'demo_url' => null,
                'github_url' => 'https://github.com/zeronosA25',
                'technologies' => ['Laravel', 'Filament v3', 'Livewire', 'Blade', 'MariaDB'],
                'is_published' => true,
            ]
        );
    }
}
