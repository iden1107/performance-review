<?php

namespace Database\Seeders;

use App\Models\EvaluationCategory;
use Illuminate\Database\Seeder;

class EvaluationCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'クレド評価', 'name_en' => 'Credo', 'weight' => 60, 'order' => 1],
            ['name' => 'スキル評価', 'name_en' => 'Skill', 'weight' => 40, 'order' => 2],
        ];

        foreach ($categories as $category) {
            EvaluationCategory::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}
