<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Organization;
use App\Models\Position;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends DemoDataSeeder
{
    public function run(): void
    {
        $csvPath = database_path('../資料/csv/組織図_20260803.csv');
        
        if (!file_exists($csvPath)) {
            $this->command->warn('CSV file not found: ' . $csvPath);
            return;
        }

        $file = fopen($csvPath, 'r');
        $header = fgetcsv($file);
        
        $positionMap = Position::pluck('id', 'name_short')->toArray();
        $orgMap = Organization::pluck('id', 'name')->toArray();

        $demoNames = $this->getDemoNames();
        $nameIndex = 0;

        while (($row = fgetcsv($file)) !== false) {
            $name = trim($row[4]);
            $role = trim($row[2]);
            $isConcurrent = str_contains($row[4] ?? '', '*');

            if ($name && $name !== '部長　' && $name !== '課長' && $name !== '係長' && $name !== '主任' && $name !== '社員') {
                $positionId = null;
                if ($role === '部長　' || $role === '部長') {
                    $positionId = $positionMap['部長'] ?? null;
                } elseif ($role === '課長') {
                    $positionId = $positionMap['課長'] ?? null;
                } elseif ($role === '係長') {
                    $positionId = $positionMap['係長'] ?? null;
                } elseif ($role === '主任') {
                    $positionId = $positionMap['主任'] ?? null;
                } elseif ($role === '主') {
                    $positionId = $positionMap['主'] ?? null;
                } elseif ($role === 'Arch') {
                    $positionId = $positionMap['Arch'] ?? null;
                } elseif ($role === 'SA') {
                    $positionId = $positionMap['SA'] ?? null;
                } elseif ($role === 'CA') {
                    $positionId = $positionMap['CA'] ?? null;
                }

                $demoName = $demoNames[$nameIndex % count($demoNames)];
                $nameIndex++;

                Employee::firstOrCreate(
                    ['name' => $demoName],
                    [
                        'position_id' => $positionId,
                        'role' => $role,
                        'is_concurrent' => $isConcurrent,
                        'status' => 'active',
                    ]
                );
            }
        }

        fclose($file);

        // 評価体系CSVからも従業員を追加
        $evalCsvPath = database_path('../資料/csv/評価体系_202612.csv');
        if (file_exists($evalCsvPath)) {
            $file = fopen($evalCsvPath, 'r');
            $header = fgetcsv($file);
            
            while (($row = fgetcsv($file)) !== false) {
                $employeeName = trim($row[2]);
                $firstEvaluatorName = trim($row[4]);
                $secondEvaluatorName = trim($row[5]);

                foreach ([$employeeName, $firstEvaluatorName, $secondEvaluatorName] as $name) {
                    if ($name && $name !== '-' && $name !== '') {
                        $demoName = $demoNames[$nameIndex % count($demoNames)];
                        $nameIndex++;

                        Employee::firstOrCreate(
                            ['name' => $demoName],
                            [
                                'role' => null,
                                'is_concurrent' => false,
                                'status' => 'active',
                            ]
                        );
                    }
                }
            }
            
            fclose($file);
        }
    }
}
