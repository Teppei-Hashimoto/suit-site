@extends('layouts.app')

@section('title')
    <title>スーツサイト</title>
@endsection

@section('content')
    <div class="w-8/12 mx-auto grid grid-cols-2 gap-4">
        @if ($posts->count())
            @foreach ($posts as $post)
                <a href="{{ route('articles.show', $post->id) }}" class="p-3 rounded-lg bg-white shadow-md">
                    <div class="font-bold text-lg">{{ $post->title }}</div>
                    <div class="text-gray-500 text-sm">投稿者：{{ $post->user->name }}</div>
                </a>
            @endforeach
        @else
            <p>まだ記事が投稿されていません</p>
        @endif
    </div>
@endsection
