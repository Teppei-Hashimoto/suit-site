@extends('layouts.app')

@section('title')
    <title>アンケート送信完了</title>
@endsection

@section('content')
    <div class="w-8/12 mx-auto mb-6 flex flex-col items-center">
        <p>アンケートを送信しました</p>
        <a href="{{ route('questionnaires.index') }}" class="mt-6 text-blue-500 hover:underline">アンケート一覧に戻る</a>
    </div>
@endsection
