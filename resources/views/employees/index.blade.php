@extends('layouts.app')

@section('title', '従業員一覧')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">従業員一覧</h1>
    
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">名前</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">組織</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">役職</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($employees as $employee)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $employee->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $employee->organization?->name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $employee->position?->name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('employees.show', $employee) }}" class="text-blue-600 hover:underline">詳細</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
