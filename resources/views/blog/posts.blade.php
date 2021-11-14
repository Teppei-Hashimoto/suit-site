@extends('ownerapp')

@section('content')
    <div class="w-8/12 mx-auto">
        <div class="flex flex-row  px-6">
            <div class="flex-grow"></div>
            <a href="{{ route('newpost') }}" class="py-2 px-5 mb-3 rounded-full bg-white shadow-md font-semibold">
                新規作成
            </a>
        </div>
        <div class="w-full bg-white p-6 pb-3 rounded-lg">
            <div class="border-2 border-gray-300 py-3 px-6 mb-3 rounded-lg flex flex-row items-center">
                <div class="flex flex-col justify-start flex-grow">
                    <p class="text-base font-bold text-gray-800">記事タイトル</p>
                    <p class="text-xs text-gray-400">2021-11-14</p>
                </div>
                <a href="" class="bg-gray-400 py-1 px-4 text-white rounded-full text-sm">
                    編 集
                </a>
                <form action="" method="post">
                    <button type="submit" class="bg-red-400 py-1 px-4 ml-3 text-white rounded-full text-sm">
                        削 除
                    </button>
                </form>
            </div>
            <div class="border-2 border-gray-300 py-3 px-6 mb-3 rounded-lg flex flex-row items-center">
                <div class="flex flex-col justify-start flex-grow">
                    <p class="text-base font-bold text-gray-800">記事タイトル</p>
                    <p class="text-xs text-gray-400">2021-11-14</p>
                </div>
                <a href="" class="bg-gray-400 py-1 px-4 text-white rounded-full text-sm">
                    編 集
                </a>
                <form action="" method="post">
                    <button type="submit" class="bg-red-400 py-1 px-4 ml-3 text-white rounded-full text-sm">
                        削 除
                    </button>
                </form>
            </div>
            <div class="border-2 border-gray-300 py-3 px-6 mb-3 rounded-lg flex flex-row items-center">
                <div class="flex flex-col justify-start flex-grow">
                    <p class="text-base font-bold text-gray-800">記事タイトル</p>
                    <p class="text-xs text-gray-400">2021-11-14</p>
                </div>
                <a href="" class="bg-gray-400 py-1 px-4 text-white rounded-full text-sm">
                    編 集
                </a>
                <form action="" method="post">
                    <button type="submit" class="bg-red-400 py-1 px-4 ml-3 text-white rounded-full text-sm">
                        削 除
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
