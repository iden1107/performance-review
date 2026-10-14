<?php

namespace Database\Seeders;

use App\Models\EvaluationPeriod;
use Illuminate\Database\Seeder;

class EvaluationPeriodSeeder extends Seeder
{
    public function run(): void
    {
        EvaluationPeriod::firstOrCreate(
            ['name' => '第37期 下半期'],
            [
                'start_date' => '2026-04-01',
                'end_date' => '2026-09-30',
                'is_active' => true,
            ]
        );
    }
}
