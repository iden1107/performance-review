<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            PositionSeeder::class,
            OrganizationSeeder::class,
            EmployeeSeeder::class,
            EvaluationPeriodSeeder::class,
            EvaluationCategorySeeder::class,
            EvaluationCriterionSeeder::class,
            EvaluationTargetSeeder::class,
            GoalSeeder::class,
        ]);
    }
}
