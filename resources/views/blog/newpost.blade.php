@extends('ownerapp')

@section('content')
    <div class="w-8/12 mx-auto">
        <div class="w-full bg-white p-6 rounded-lg">
            <form action="{{ route('posts.store') }}" method="post" class="flex flex-col">
                @csrf
                <label for="title" class="font-semibold text-lg">
                    記事タイトル
                </label>
                <textarea name="title" id="title" cols="30" rows="1" class="bg-gray-100 border-2 w-full py-2 px-4 mb-6 rounded-lg @error('title') border-red-500 @enderror"></textarea>

                @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="content" class="font-semibold text-lg">
                    本文
                </label>
                <textarea name="content" id="content" cols="30" rows="20" class="bg-gray-100 border-2 w-full py-2 px-4 mb-6 rounded-lg @error('content') border-red-500 @enderror"></textarea>

                @error('content')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="w-1/4 bg-blue-400 text-white px-4 py-2 rounded-full font-bold shadow-md">
                    投稿する
                </button>
            </form>
        </div>
    </div>
@endsection
