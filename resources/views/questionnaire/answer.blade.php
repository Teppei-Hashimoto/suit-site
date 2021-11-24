@extends('layouts.app')

@section('title')
    <title>{{ $questionnaire->questionnaire_title }}</title>
@endsection

@section('content')
    <div class="w-8/12 mx-auto mb-6">
        <div class="w-full bg-white p-6 mt-6 mb-12 rounded-lg flex flex-col">
            <h1 class="text-xl font-bold mb-4">{{ $questionnaire->questionnaire_title }}</h1>
            <p class="text-sm text-gray-500">{{ $questionnaire->questionnaire_summary }}</p>
        </div>
        <form action="{{ route('answer.store') }}" method="post">
            @csrf
            <input type="hidden" name="questionnaire_id" value="{{ $questionnaire->id }}">
            <div id="question-list" class="felx flex-col mb-12">
            @foreach ($questionnaire->questions as $question)
                <div class="question-item w-full bg-white p-6 mt-6 rounded-lg flex flex-col">
                    <h2 class="text-lg font-bold mb-4">{{ $question->question_content }}</h2>
                    <input type="hidden" name="questions[{{ $question->id }}][question_type_id]" value="{{ $question->question_type->id }}">
                    <input type="hidden" name="questions[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                    @switch($question->question_type->question_type_name)
                        @case("free_form")
                            <input type="text" name="questions[{{ $question->id }}][a_free_form_text]" class="textform">
                            @break
                        @case("radio_button")
                            <div class="choice-list flex flex-col">
                                @foreach ($question->q_radio_buttons as $radio_button)
                                    <div class="flex flex-row items-center">
                                        <input type="radio" name="questions[{{ $question->id }}][q_radio_button_id]" id="q{{ $question->id }}-{{ $radio_button->id }}" value="{{ $radio_button->id }}" class="mr-3">
                                        <label for="q{{ $question->id }}-{{ $radio_button->id }}" class="cursor-pointer">{{ $radio_button->q_radio_button_text }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @break
                        @case("check_box")
                            <div class="choice-list flex flex-col">
                                @foreach ($question->q_check_boxes as $check_box)
                                    <div class="flex flex-row items-center">
                                        <input type="checkbox" name="questions[{{ $question->id }}][q_check_box_id][]" id="q{{ $question->id }}-{{ $check_box->id }}" value="{{ $check_box->id }}" class="mr-3">
                                        <label for="q{{ $question->id }}-{{ $check_box->id }}" class="cursor-pointer">{{ $check_box->q_check_box_text }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @break
                        @default
                            @break
                    @endswitch
                </div>

            @endforeach
            </div>

            <div class="flex flex-row">
                <div class="flex-grow"></div>
                <button type="button" class="inline-block bg-blue-400 text-white px-8 py-2 rounded-full font-bold shadow-md" onclick="submit();">
                    回答する
                </button>
            </div>
        </form>
    </div>
@endsection
