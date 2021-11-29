@extends('layouts.ownerapp')

@section('title')
    <title>アンケート管理画面</title>
@endsection

@section('content')
    <div class="w-8/12 mx-auto mb-6 flex flex-col">
        <div class="flex flex-row p-6">
            <div class="flex-grow"></div>
            <a href="{{ route('questionnaires.create') }}" class="py-2 px-5 mb-3 rounded-full bg-white shadow-md font-semibold">
                新規アンケート作成
            </a>
        </div>
        <div class="text-xl font-bold mb-6">アンケート管理</div>
        <ul class="flex flex-col">
            @foreach ($questionnaires as $questionnaire)
                <a href="{{ route('questionnaires.show', $questionnaire->id) }}" class="mb-6">
                    <li class="bg-white rounded-lg p-6">
                        <div class="text-lg font-bold">{{ $questionnaire->questionnaire_title }}</div>
                        <div class="text-gray-400 text-sm">作成日：{{ $questionnaire->created_at }}</div>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
@endsection
