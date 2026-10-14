<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
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
        
        $organizations = [];
        $parentMap = [];

        while (($row = fgetcsv($file)) !== false) {
            if (empty($row[0])) continue;

            $category = trim($row[0]);
            $name = trim($row[2]);
            $nameEn = trim($row[14]);
            $manager = trim($row[4]);

            if ($category && !$name) {
                $parentMap[$category] = Organization::firstOrCreate([
                    'name' => $category,
                    'category' => $category,
                    'level' => 0,
                ])->id;
            }

            if ($name) {
                $parentId = $parentMap[$category] ?? null;
                $org = Organization::firstOrCreate([
                    'name' => $name,
                    'parent_id' => $parentId,
                ], [
                    'name_en' => $nameEn ?: null,
                    'level' => $parentId ? 1 : 0,
                    'category' => $category,
                ]);

                if ($manager && !$parentMap[$manager]) {
                    $parentMap[$manager] = $org->id;
                }
            }
        }

        fclose($file);
    }
}
