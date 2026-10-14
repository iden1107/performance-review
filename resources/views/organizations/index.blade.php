@extends('layouts.app')

@section('title', '組織図')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">組織図</h1>
    
    <div class="space-y-4">
        @foreach($organizations as $org)
            <div class="border rounded-lg p-4 ml-{{ $org->level * 4 }}">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold">{{ $org->name }}</h2>
                        @if($org->name_en)
                            <span class="text-gray-500 text-sm">{{ $org->name_en }}</span>
                        @endif
                    </div>
                    <a href="{{ route('organizations.show', $org) }}" class="text-blue-600 hover:underline">詳細</a>
                </div>
                @if($org->category)
                    <span class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded mt-2">{{ $org->category }}</span>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
