@extends('layouts.app')

@section('title', '評価一覧')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">評価一覧</h1>
    
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">評価対象者</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">期間</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">一次評価者</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">二次評価者</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($targets as $target)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $target->employee->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $target->evaluationPeriod->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $target->firstEvaluator?->name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $target->secondEvaluator?->name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('evaluations.show', $target) }}" class="text-blue-600 hover:underline">詳細</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
