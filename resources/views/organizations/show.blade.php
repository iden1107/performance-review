@extends('layouts.app')

@section('title', $organization->name)

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6">
        <a href="{{ route('organizations.index') }}" class="text-blue-600 hover:underline">← 戻る</a>
    </div>
    
    <h1 class="text-2xl font-bold mb-4">{{ $organization->name }}</h1>
    
    @if($organization->parent)
        <p class="text-gray-600 mb-4">上位組織: {{ $organization->parent->name }}</p>
    @endif
    
    @if($organization->children->count() > 0)
        <h2 class="text-xl font-semibold mt-6 mb-4">下位組織</h2>
        <ul class="list-disc list-inside space-y-2">
            @foreach($organization->children as $child)
                <li><a href="{{ route('organizations.show', $child) }}" class="text-blue-600 hover:underline">{{ $child->name }}</a></li>
            @endforeach
        </ul>
    @endif
    
    @if($organization->employees->count() > 0)
        <h2 class="text-xl font-semibold mt-6 mb-4">所属従業員</h2>
        <ul class="list-disc list-inside space-y-2">
            @foreach($organization->employees as $employee)
                <li><a href="{{ route('employees.show', $employee) }}" class="text-blue-600 hover:underline">{{ $employee->name }}</a></li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
