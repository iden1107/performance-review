@extends('layouts.app')

@section('title', '評価詳細')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6">
        <a href="{{ route('evaluations.index') }}" class="text-blue-600 hover:underline">← 戻る</a>
    </div>
    
    <h1 class="text-2xl font-bold mb-4">{{ $target->employee->name }} の評価</h1>
    
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-gray-600">評価期間</p>
            <p class="font-semibold">{{ $target->evaluationPeriod->name }}</p>
        </div>
        <div>
            <p class="text-gray-600">評価タイプ</p>
            <p class="font-semibold">{{ $target->evaluation_type }}</p>
        </div>
        <div>
            <p class="text-gray-600">一次評価者</p>
            <p class="font-semibold">{{ $target->firstEvaluator?->name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-gray-600">二次評価者</p>
            <p class="font-semibold">{{ $target->secondEvaluator?->name ?? '-' }}</p>
        </div>
    </div>
    
    @if($target->scores->count() > 0)
        <h2 class="text-xl font-semibold mt-6 mb-4">評価スコア</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">項目</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">自己評価</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">一次評価</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">二次評価</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">最終スコア</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($target->scores as $score)
                    <tr>
                        <td class="px-6 py-4">{{ $score->criterion->name }}</td>
                        <td class="px-6 py-4">{{ $score->self_score ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $score->first_score ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $score->second_score ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $score->final_score ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
