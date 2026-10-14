<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    protected function getDemoNames(): array
    {
        return [
            '田中 太郎', '鈴木 一郎', '佐藤 次郎', '山田 三郎', '高橋 四郎',
            '伊藤 五郎', '渡辺 六郎', '中村 七郎', '小林 八郎', '加藤 九郎',
            '山本 十郎', '佐々木 十一郎', '斎藤 十二郎', '鈴木 十三郎', '高木 十四郎',
            '田中 十五郎', '伊藤 十六郎', '渡辺 十七郎', '中村 十八郎', '小林 十九郎',
            '加藤 二十郎', '山本 二十一郎', '佐々木 二十二郎', '斎藤 二十三郎', '鈴木 二十四郎',
        ];
    }

    protected function getDemoGoals(): array
    {
        return [
            'プロジェクトの品質向上を目指す',
            '新しい技術の習得と実践',
            'チームの生産性向上',
            '顧客満足度の改善',
            '業務プロセスの効率化',
            '社内コミュニケーションの活性化',
            'スキルアップの支援',
            'ドキュメントの整備',
            'コード品質の向上',
            'リーダーシップの強化',
        ];
    }
}
