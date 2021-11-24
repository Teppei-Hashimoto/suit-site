@extends('layouts.app')

@section('title')
    <title>アンケート一覧</title>
@endsection

@section('content')
    <div class="w-8/12 mx-auto mb-6 flex flex-col">
        <div class="text-xl font-bold mb-6">アンケート一覧</div>
        <ul class="flex flex-col">
            @foreach ($questionnaires as $questionnaire)
                <li class="flex flex-row items-center justify-between bg-white rounded-lg p-6 mb-6">
                    <div class="text-lg font-bold">{{ $questionnaire->questionnaire_title }}</div>
                    <a href="{{ route('answer.create', $questionnaire->id) }}" class="border-2 border-gray-400 rounded-full px-4 py-1 font-bold text-gray-500">
                        回答する
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
