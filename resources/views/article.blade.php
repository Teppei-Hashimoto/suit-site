@extends('layouts.app')

@section('title')
    <title>{{ $post->title }} - スーツサイト</title>
@endsection

@section('content')
    <div class="w-8/12 mx-auto">
        <a href="{{ route('home') }}" class="ml-6 text-lg font-bold">← ホームに戻る</a>
        <div class="w-full bg-white p-6 mt-6 rounded-lg flex flex-col">
            <h1 class="text-xl font-bold">{{ $post->title }}</h1>
            <div class="flex flex-row items-center">
                <span class="text-base text-gray-500 mr-4">{{ $post->user->name }}</span>
                <i class="fas fa-history text-gray-500 mr-1"></i>
                <span class="text-sm text-gray-500">{{ $post->updated_at }}</span>
            </div>
            <div class="w-full p-3">
                <p>{{ $post->content }}</p>
            </div>
        </div>
    </div>
@endsection
