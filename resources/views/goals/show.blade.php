@extends('layouts.app')

@section('title', '目標詳細')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6">
        <a href="{{ route('goals.index') }}" class="text-blue-600 hover:underline">← 戻る</a>
    </div>
    
    <h1 class="text-2xl font-bold mb-4">目標詳細</h1>
    
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-gray-600">担当者</p>
            <p class="font-semibold">{{ $goal->employee?->name ?? $goal->team_name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-gray-600">組織</p>
            <p class="font-semibold">{{ $goal->organization?->name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-gray-600">期間</p>
            <p class="font-semibold">{{ $goal->start_date }} ～ {{ $goal->end_date }}</p>
        </div>
        <div>
            <p class="text-gray-600">達成率</p>
            <p class="font-semibold">{{ $goal->achievement_rate ?? '-' }}</p>
        </div>
    </div>
    
    <div class="mb-6">
        <p class="text-gray-600 mb-2">目標</p>
        <p class="font-semibold">{{ $goal->goal }}</p>
    </div>
    
    @if($goal->kpi)
        <div class="mb-6">
            <p class="text-gray-600 mb-2">KPI</p>
            <p class="whitespace-pre-line">{{ $goal->kpi }}</p>
        </div>
    @endif
    
    @if($goal->memo)
        <div class="mb-6">
            <p class="text-gray-600 mb-2">メモ</p>
            <p class="whitespace-pre-line">{{ $goal->memo }}</p>
        </div>
    @endif
</div>
@endsection
