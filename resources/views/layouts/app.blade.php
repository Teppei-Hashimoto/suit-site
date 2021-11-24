<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('title')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    </head>
    <body class="bg-gray-200 pb-6">
        <nav class="p-6 mb-6 bg-white flex justify-between items-center shadow-md">
            <a href="{{ route('home') }}" class="text-xl font-bold">
                スーツサイト
            </a>
            <a href="{{ route('questionnaires.index') }}">アンケート一覧</a>
        </nav>
        @yield('content')
        @yield('js')
    </body>
</html>
