@extends('layouts.ownerapp')

@section('content')
    <div class="w-8/12 mx-auto">
        <div class="flex flex-row  px-6">
            <div class="flex-grow"></div>
            <a href="{{ route('posts.create') }}" class="py-2 px-5 mb-3 rounded-full bg-white shadow-md font-semibold">
                新規作成
            </a>
        </div>
        <div class="w-full bg-white p-6 pb-3 rounded-lg">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="border-2 border-gray-300 py-3 px-6 mb-3 rounded-lg flex flex-row items-center">
                        <div class="flex flex-col justify-start flex-grow">
                            <p class="text-base font-bold text-gray-800">{{ $post->title }}</p>
                            <p class="text-xs text-gray-400">{{ $post->updated_at }}</p>
                        </div>
                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-gray-400 py-1 px-4 text-white rounded-full text-sm">
                            編 集
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400 py-1 px-4 ml-3 text-white rounded-full text-sm">
                                削 除
                            </button>
                        </form>
                    </div>
                @endforeach
            @else
                <p class="mb-3">記事が投稿されていません</p>
            @endif
        </div>
    </div>
@endsection
