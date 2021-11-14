<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>スーツサイト</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-200 pb-6">
        <nav class="p-6 mb-6 bg-white flex justify-between shadow-md">
            <div>
                スーツサイト
            </div>
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
    </body>
</html>
