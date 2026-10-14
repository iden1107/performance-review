@extends('layouts.app')

@section('title', '目標一覧')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">目標一覧</h1>
    
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">目標</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">担当者</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">期間</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">達成率</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($goals as $goal)
                <tr>
                    <td class="px-6 py-4">{{ Str::limit($goal->goal, 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $goal->employee?->name ?? $goal->team_name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $goal->start_date }} ～ {{ $goal->end_date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $goal->achievement_rate ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('goals.show', $goal) }}" class="text-blue-600 hover:underline">詳細</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
