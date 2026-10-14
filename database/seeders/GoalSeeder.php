<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EvaluationPeriod;
use App\Models\Goal;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class GoalSeeder extends DemoDataSeeder
{
    public function run(): void
    {
        $csvPath = database_path('../資料/csv/目標管理.csv');
        
        if (!file_exists($csvPath)) {
            $this->command->warn('CSV file not found: ' . $csvPath);
            return;
        }

        $file = fopen($csvPath, 'r');
        $header = fgetcsv($file);
        
        $period = EvaluationPeriod::where('name', '第37期 下半期')->first();
        $employeeMap = Employee::pluck('id', 'name')->toArray();
        $orgMap = Organization::pluck('id', 'name')->toArray();

        $demoGoals = $this->getDemoGoals();
        $goalIndex = 0;

        while (($row = fgetcsv($file)) !== false) {
            if (count($row) < 6) continue;
            
            $orgName = trim($row[0] ?? '');
            $goalType = trim($row[1] ?? '');
            $teamName = trim($row[2] ?? '');
            $startDate = trim($row[3] ?? '');
            $endDate = trim($row[4] ?? '');
            $goal = trim($row[5] ?? '');
            $kpi = trim($row[6] ?? '');
            $achievementRate = trim($row[7] ?? '');
            $isCompleted = trim($row[8] ?? '') === 'Done';
            $memo = trim($row[9] ?? '');

            if ($goal && $goal !== '目標') {
                $employeeId = $employeeMap[$teamName] ?? null;
                $organizationId = $orgMap[$orgName] ?? null;

                $demoGoal = $demoGoals[$goalIndex % count($demoGoals)];
                $goalIndex++;

                Goal::create([
                    'evaluation_period_id' => $period->id,
                    'employee_id' => $employeeId,
                    'organization_id' => $organizationId,
                    'goal_type' => $goalType,
                    'team_name' => $teamName,
                    'start_date' => $startDate ?: '2026-04-01',
                    'end_date' => $endDate ?: '2026-09-30',
                    'goal' => $demoGoal,
                    'kpi' => $kpi ?: null,
                    'achievement_rate' => $achievementRate ?: null,
                    'is_completed' => $isCompleted,
                    'memo' => $memo ?: null,
                ]);
            }
        }

        fclose($file);
    }
}
