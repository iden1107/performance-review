<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Performance Review')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Performance Review System</h1>
            <div class="space-x-4">
                <a href="{{ route('organizations.index') }}" class="hover:underline">組織図</a>
                <a href="{{ route('employees.index') }}" class="hover:underline">従業員</a>
                <a href="{{ route('evaluations.index') }}" class="hover:underline">評価</a>
                <a href="{{ route('goals.index') }}" class="hover:underline">目標</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>
