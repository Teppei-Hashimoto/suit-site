@extends('layouts.ownerapp')

@section('title')
    <title>新規アンケート作成</title>
@endsection

@section('content')
    <div class="w-8/12 mx-auto mb-6">
        <form action="{{ route('questionnaires.store') }}" method="post">
            @csrf
            <div class="w-full bg-white p-6 mt-6 mb-12 rounded-lg flex flex-col">
                <label for="title" class="text-xl font-bold">アンケートの題名</label>
                <input type="text" name="title" id="title" class="textform text-xl mb-6 px-4 py-3">
                <label for="summary">アンケートの概要</label>
                <textarea name="summary" id="summary" cols="30" rows="2" class="text-gray-700 px-4 py-3 rounded border border-gray-200 bg-gray-200 resize-y focus:outline-none focus:bg-white"></textarea>
            </div>
            <input type="hidden" name="q_num" id="q_num" value="1">
            <div id="question-list" class="mb-6"></div>

            <div class="flex flex-row items-center mb-8">
                <div class="mr-6">質問の追加</div>
                <button type="button" class="bg-gray-500 px-4 py-2 mr-4 rounded-full shadow-md text-white font-bold" onclick="addQuestionElem('free_form')">
                    記述式
                </button>
                <button type="button" class="bg-gray-500 px-4 py-2 mr-4 rounded-full shadow-md text-white font-bold" onclick="addQuestionElem('radio_button')">
                    ラジオボタン
                </button>
                <button type="button" class="bg-gray-500 px-4 py-2 rounded-full shadow-md text-white font-bold" onclick="addQuestionElem('check_box')">
                    チェックボックス
                </button>
            </div>

            <div class="flex flex-row">
                <div class="flex-grow"></div>
                <button type="button" class="inline-block bg-blue-400 text-white px-8 py-2 rounded-full font-bold shadow-md" onclick="submit();">
                    作成
                </button>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/question_elements.js') }}"></script>
    <script src="{{ asset('js/choice_elements.js') }}"></script>
    <script>
        // 画面読み込み時に実行される処理
        window.onload = () => {
            addQuestionElem("free_form");
        };
    </script>
@endsection
