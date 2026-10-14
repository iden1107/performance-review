<?php

namespace Database\Seeders;

use App\Models\EvaluationCategory;
use App\Models\EvaluationCriterion;
use Illuminate\Database\Seeder;

class EvaluationCriterionSeeder extends Seeder
{
    public function run(): void
    {
        $credCategory = EvaluationCategory::where('name', 'クレド評価')->first();
        $skillCategory = EvaluationCategory::where('name', 'スキル評価')->first();

        $credCriteria = [
            ['自律度', 30, 1],
            ['自律度', 10, 2],
            ['自律度', 30, 3],
            ['自律度', 50, 4],
            ['自律度', 30, 5],
            ['チームワーク', 20, 6],
            ['チームワーク', 20, 7],
            ['チームワーク', 20, 8],
            ['チームワーク', 20, 9],
            ['チームワーク', 10, 10],
            ['プロフェッショナリズム', 30, 11],
            ['プロフェッショナリズム', 20, 12],
            ['プロフェッショナリズム', 30, 13],
            ['プロフェッショナリズム', 30, 14],
            ['プロフェッショナリズム', 30, 15],
            ['成長意欲', 20, 16],
            ['成長意欲', 20, 17],
            ['成長意欲', 10, 18],
            ['成長意欲', 10, 19],
            ['成長意欲', 10, 20],
        ];

        $skillCriteria = [
            ['開発', 20, 27],
            ['開発', 10, 28],
            ['開発', 10, 29],
            ['開発', 10, 30],
            ['開発', 20, 31],
            ['開発', 10, 32],
            ['開発', 30, 33],
        ];

        foreach ($credCriteria as $i => $criterion) {
            EvaluationCriterion::firstOrCreate([
                'category_id' => $credCategory->id,
                'name' => $criterion[0],
                'order' => $criterion[2],
            ], [
                'max_score' => $criterion[1],
                'evaluation_type' => 'general',
            ]);
        }

        foreach ($skillCriteria as $criterion) {
            EvaluationCriterion::firstOrCreate([
                'category_id' => $skillCategory->id,
                'name' => $criterion[0],
                'order' => $criterion[2],
            ], [
                'max_score' => $criterion[1],
                'evaluation_type' => 'development',
            ]);
        }
    }
}
