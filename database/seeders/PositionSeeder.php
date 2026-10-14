<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['name' => '代表取締役会長', 'name_short' => '会長', 'level' => 5, 'category' => '役員'],
            ['name' => '代表取締役', 'name_short' => '代表', 'level' => 4, 'category' => '役員'],
            ['name' => '取締役', 'name_short' => '取締', 'level' => 4, 'category' => '役員'],
            ['name' => '事業部長', 'name_short' => '事業部長', 'level' => 3, 'category' => '管理職'],
            ['name' => '部長', 'name_short' => '部長', 'level' => 2, 'category' => '管理職'],
            ['name' => '課長', 'name_short' => '課長', 'level' => 1, 'category' => '管理職'],
            ['name' => '係長', 'name_short' => '係長', 'level' => 0, 'category' => '一般職'],
            ['name' => '主任', 'name_short' => '主任', 'level' => 0, 'category' => '一般職'],
            ['name' => '主担当', 'name_short' => '主', 'level' => 0, 'category' => '一般職'],
            ['name' => '担当', 'name_short' => '', 'level' => 0, 'category' => '一般職'],
            ['name' => 'シニアアーキテクト', 'name_short' => 'SA', 'level' => 0, 'category' => '一般職'],
            ['name' => 'チャレンジアーキテクト', 'name_short' => 'CA', 'level' => 0, 'category' => '一般職'],
            ['name' => 'アーキテクト', 'name_short' => 'Arch', 'level' => 0, 'category' => '一般職'],
        ];

        foreach ($positions as $position) {
            Position::firstOrCreate(['name' => $position], $position);
        }
    }
}
