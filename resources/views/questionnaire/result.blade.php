@extends('layouts.ownerapp')

@section('title')
    <title>アンケート集計結果</title>
@endsection

@section('content')
    <div class="w-8/12 mx-auto mb-6">
        <div class="w-full bg-white p-6 mt-6 mb-6 rounded-lg flex flex-col">
            <h1 class="text-xl font-bold mb-4">{{ $questionnaire->questionnaire_title }}</h1>
            <p class="text-sm text-gray-500">{{ $questionnaire->questionnaire_summary }}</p>
        </div>
        <div class="w-full bg-white p-6 mt-6 mb-12 rounded-lg flex flex-col">
            <div>アンケート集計結果</div>
            <div class="text-gray-500">回答者数 {{ $questionnaire->answers->count() }}</div>
        </div>
        <div class="felx flex-col mb-12">
            @foreach ($questionnaire->questions as $question)
                <div class="bg-white rounded-lg p-6 mt-6">
                    @switch($question->question_type->question_type_name)
                        @case("free_form")
                            <div class="text-gray-500">記述式</div>
                            <h2 class="text-lg font-bold mb-4">{{ $question->question_content }}</h2>
                            <ul>
                                @foreach ($question->a_free_forms as $a_free_form)
                                    <li>
                                        <p class="border-b-2 border-gray-300 pb-1 mb-3">{{ $a_free_form->a_free_form_text }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            @break
                        @case("radio_button")
                            @php
                                $total_count = $question->a_radio_buttons->count();
                            @endphp
                            <div class="text-gray-500">ラジオボタン</div>
                            <h2 class="text-lg font-bold mb-4">{{ $question->question_content }}</h2>
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">選択肢</th>
                                        <th class="px-4 py-2">集計</th>
                                        <th class="px-4 py-2">割合</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($question->q_radio_buttons as $q_radio_button)
                                        @php
                                            $select_count = $question->a_radio_buttons->where('q_radio_button_id', $q_radio_button->id)->count();
                                        @endphp
                                        <tr>
                                            <td class="border px-4 py-2">{{ $q_radio_button->q_radio_button_text }}</td>
                                            <td class="border px-4 py-2">{{ $select_count }}</td>
                                            <td class="border px-4 py-2">{{ round($select_count / $total_count * 100) }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @break
                        @case("check_box")
                            <div class="text-gray-500">チェックボックス</div>
                            <h2 class="text-lg font-bold mb-4">{{ $question->question_content }}</h2>
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">選択肢</th>
                                        <th class="px-4 py-2">集計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($question->q_check_boxes as $q_check_box)
                                        @php
                                            $select_count = $question->a_check_boxes->where('q_check_box_id', $q_check_box->id)->count();
                                        @endphp
                                        <tr>
                                            <td class="border px-4 py-2">{{ $q_check_box->q_check_box_text }}</td>
                                            <td class="border px-4 py-2">{{ $select_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @break
                        @default
                            @break
                    @endswitch
                </div>
            @endforeach
        </div>
    </div>
@endsection
