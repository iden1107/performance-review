<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EvaluationPeriod;
use App\Models\EvaluationTarget;
use Illuminate\Database\Seeder;

class EvaluationTargetSeeder extends DemoDataSeeder
{
    public function run(): void
    {
        $csvPath = database_path('../資料/csv/評価体系_202612.csv');
        
        if (!file_exists($csvPath)) {
            $this->command->warn('CSV file not found: ' . $csvPath);
            return;
        }

        $file = fopen($csvPath, 'r');
        $header = fgetcsv($file);
        
        $period = EvaluationPeriod::where('name', '第37期 下半期')->first();
        $employees = Employee::all();
        $employeeMap = $employees->pluck('id', 'name')->toArray();

        $demoNames = $this->getDemoNames();
        $nameIndex = 0;

        while (($row = fgetcsv($file)) !== false) {
            $orgName = trim($row[0]);
            $role = trim($row[1]);
            $employeeName = trim($row[2]);
            $evaluationType = trim($row[3]);
            $firstEvaluatorName = trim($row[4]);
            $secondEvaluatorName = trim($row[5]);
            $notes = trim($row[6]);

            if ($employeeName && $employeeName !== '-') {
                $demoEmployeeName = $demoNames[$nameIndex % count($demoNames)];
                $nameIndex++;

                $employeeId = $employeeMap[$demoEmployeeName] ?? null;
                
                if ($employeeId) {
                    $firstEvaluatorId = $employeeMap[$demoNames[($nameIndex + 1) % count($demoNames)]] ?? null;
                    $secondEvaluatorId = $employeeMap[$demoNames[($nameIndex + 2) % count($demoNames)]] ?? null;

                    EvaluationTarget::firstOrCreate([
                        'evaluation_period_id' => $period->id,
                        'employee_id' => $employeeId,
                    ], [
                        'first_evaluator_id' => $firstEvaluatorId,
                        'second_evaluator_id' => $secondEvaluatorId,
                        'evaluation_type' => $evaluationType,
                        'requires_self_evaluation' => str_contains($notes, '不要') ? false : true,
                        'notes' => $notes ?: null,
                    ]);
                }
            }
        }

        fclose($file);
    }
}
