@extends('layouts.app')

@section('title', $employee->name)

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6">
        <a href="{{ route('employees.index') }}" class="text-blue-600 hover:underline">← 戻る</a>
    </div>
    
    <h1 class="text-2xl font-bold mb-4">{{ $employee->name }}</h1>
    
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-gray-600">組織</p>
            <p class="font-semibold">{{ $employee->organization?->name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-gray-600">役職</p>
            <p class="font-semibold">{{ $employee->position?->name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-gray-600">ロール</p>
            <p class="font-semibold">{{ $employee->role ?? '-' }}</p>
        </div>
        <div>
            <p class="text-gray-600">ステータス</p>
            <p class="font-semibold">{{ $employee->status }}</p>
        </div>
    </div>
    
    @if($employee->evaluationTargets->count() > 0)
        <h2 class="text-xl font-semibold mt-6 mb-4">評価対象</h2>
        <ul class="list-disc list-inside space-y-2">
            @foreach($employee->evaluationTargets as $target)
                <li><a href="{{ route('evaluations.show', $target) }}" class="text-blue-600 hover:underline">{{ $target->evaluationPeriod->name }}</a></li>
            @endforeach
        </ul>
    @endif
    
    @if($employee->goals->count() > 0)
        <h2 class="text-xl font-semibold mt-6 mb-4">目標</h2>
        <ul class="list-disc list-inside space-y-2">
            @foreach($employee->goals as $goal)
                <li><a href="{{ route('goals.show', $goal) }}" class="text-blue-600 hover:underline">{{ Str::limit($goal->goal, 50) }}</a></li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
