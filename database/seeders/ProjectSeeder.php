<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'MKM Productivity',
                'slug' => 'mkm-productivity',
                'category' => 'web',
                'summary' => 'Tool internal pencatatan & monitoring produktivitas harian manufaktur otomotif.',
                'description' => "Aplikasi internal untuk mencatat produksi, loss time, inhouse claim, dan manpower per section/shift, lalu menyajikan KPI (process ratio, loss ratio, efisiensi) dan laporan.\n\nDibangun dengan Laravel 12, Livewire, Filament, dan TallStackUI. Role-based access (operator, supervisor, admin) via Spatie Permission.",
                'tech_stack' => ['Laravel', 'Livewire', 'Filament', 'Tailwind', 'MySQL'],
                'thumbnail' => null,
                'repo_url' => null,
                'demo_url' => null,
                'meta' => null,
                'featured' => true,
                'sort_order' => 1,
                'published' => true,
            ],
            [
                'title' => 'Customer Churn Prediction',
                'slug' => 'customer-churn-prediction',
                'category' => 'ml',
                'summary' => 'Model klasifikasi memprediksi pelanggan yang berpotensi berhenti berlangganan.',
                'description' => "Analisis dan pemodelan churn pelanggan: EDA, feature engineering, training beberapa model, dan evaluasi.\n\nTujuan: identifikasi pelanggan berisiko tinggi agar tim retensi bisa bertindak lebih awal.",
                'tech_stack' => ['Python', 'pandas', 'scikit-learn', 'XGBoost'],
                'thumbnail' => null,
                'repo_url' => null,
                'demo_url' => null,
                'meta' => [
                    'model' => 'XGBoost',
                    'accuracy' => '—',
                    'notebook_url' => null,
                    'dataset' => 'Telco Customer Churn',
                ],
                'featured' => true,
                'sort_order' => 2,
                'published' => true,
            ],
            [
                'title' => 'Klasifikasi Ketergantungan Impor Bahan Baku Petrokimia',
                'slug' => 'petrokimia-import-dependency-xgboost',
                'category' => 'ml',
                'summary' => 'Model XGBoost untuk klasifikasi tingkat ketergantungan impor, disajikan via FastAPI + React.',
                'description' => "Prototipe aplikasi klasifikasi tingkat ketergantungan impor bahan baku petrokimia.\n\nModel XGBoost di-deploy sebagai REST API (FastAPI), dikonsumsi frontend React.",
                'tech_stack' => ['Python', 'XGBoost', 'FastAPI', 'React'],
                'thumbnail' => null,
                'repo_url' => null,
                'demo_url' => null,
                'meta' => [
                    'model' => 'XGBoost',
                    'serving' => 'FastAPI',
                    'frontend' => 'React',
                    'notebook_url' => null,
                ],
                'featured' => false,
                'sort_order' => 3,
                'published' => true,
            ],
        ];

        foreach ($projects as $data) {
            Project::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
