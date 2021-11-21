@extends('layouts.ownerapp')

@section('content')
    <div class="w-8/12 mx-auto mb-6">
        <form action="{{ route('questionnaires.store') }}" method="post">
            @csrf
            <div class="w-full bg-white p-6 mt-6 rounded-lg flex flex-col">
                <label for="title">アンケートの題名</label>
                <input type="text" name="title" id="title" class="textform text-xl mb-6 px-4 py-3">
                <label for="sammary">アンケートの概要</label>
                <textarea name="sammary" id="sammary" cols="30" rows="2" class="text-gray-700 px-4 py-3 rounded border border-gray-200 bg-gray-200 resize-y focus:outline-none focus:bg-white"></textarea>
            </div>
            <div id="questions-list" class="mb-6">
                <div class="w-full bg-white p-6 mt-6 rounded-lg flex flex-col">
                    <label for="q1">記述式の質問</label>
                    <input type="text" name="q1" id="q1" class="q-title textform text-xl mb-6 px-4 py-3">
                    <input type="hidden" name="" value="txt" class="question-type">
                    <div class="flex flex-row items-center">
                        <div class="flex-grow"></div>
                        <label for="q1_required" class="mr-1 cursor-pointer">必須</label>
                        <input type="checkbox" name="q1_required" id="q1_required" class="mr-4 cursor-pointer">
                        <button type="button" class="p-2 text-lg" onclick="removeQuestionElem(this)"><i class="far fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="w-full bg-white p-6 mt-6 rounded-lg flex flex-col">
                    <label for="q2">ラジオボタンの質問</label>
                    <input type="text" name="q2" id="q2" class="q-title textform text-xl mb-6 px-4 py-3">
                    <input type="hidden" name="" value="rb" class="question-type">
                    <ul>
                        <li class="flex flex-row items-center mb-2">
                            <i class="far fa-circle text-lg mr-2"></i>
                            <input type="text" name="q2-cb1" id="q2-cb1" class="choice-text flex-grow textform">
                            <button type="button" class="p-2 text-lg" onclick="removeChoiceElem(this)"><i class="fas fa-times"></i></button>
                        </li>
                        <button type="button" class="inline-block py-1 px-4 border-2 border-gray-400 rounded-full" onclick="addChoiceElem(this)">追加</button>
                    </ul>
                    <div class="flex flex-row items-center">
                        <div class="flex-grow"></div>
                        <label for="q2_required" class="mr-1 cursor-pointer">必須</label>
                        <input type="checkbox" name="q2_required" id="q2_required" class="mr-4 cursor-pointer">
                        <button type="button" class="p-2 text-lg" onclick="removeQuestionElem(this)"><i class="far fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="w-full bg-white p-6 mt-6 rounded-lg flex flex-col">
                    <label for="q3">チェックボックスの質問</label>
                    <input type="text" name="q3" id="q3" class="q-title textform text-xl mb-6 px-4 py-3">
                    <input type="hidden" name="" value="cb" class="question-type">
                    <ul>
                        <li class="flex flex-row items-center mb-2">
                            <i class="far fa-square text-lg mr-2"></i>
                            <input type="text" name="q3-cb1" id="q3-cb1" class="choice-text flex-grow textform">
                            <button type="button" class="p-2 text-lg" onclick="removeChoiceElem(this)"><i class="fas fa-times"></i></button>
                        </li>
                        <button type="button" class="inline-block py-1 px-4 border-2 border-gray-400 rounded-full" onclick="addChoiceElem(this)">追加</button>
                    </ul>
                    <div class="flex flex-row items-center">
                        <div class="flex-grow"></div>
                        <label for="q3_required" class="mr-1 cursor-pointer">必須</label>
                        <input type="checkbox" name="q3_required" id="q3_required" class="mr-4 cursor-pointer">
                        <button type="button" class="p-2 text-lg" onclick="removeQuestionElem(this)"><i class="far fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-1/4 bg-blue-400 text-white px-4 py-2 rounded-full font-bold shadow-md">
                作成
            </button>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/questionnaire.js') }}"></script>
@endsection
