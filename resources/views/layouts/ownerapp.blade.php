<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <title>スーツサイト</title> --}}
        @yield('title')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    </head>
    <body class="bg-gray-200 pb-6">
        <nav class="p-6 mb-6 bg-white flex flex-row items-center shadow-md">
            <div class="text-xl font-bold mr-6">
                スーツサイト
            </div>
            @auth
                <a href="{{ route('posts.index') }}" class="p-3">記事管理</a>
                <a href="{{ route('questionnaires.info') }}" class="p-3">アンケート管理</a>
            @endauth
            <div class="flex-grow"></div>
            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="inline p-3">
                            @csrf
                            <button type="submit">
                                ログアウト
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">ログイン</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">登録</a>
                    </li>
                @endguest
            </ul>
        </nav>
        @yield('content')
        @yield('js')
    </body>
</html>
