<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire\Questionnaire;
use App\Models\Questionnaire\Question_type;

class AnswerController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::latest()->get();
        return view('questionnaire.index', [
            'questionnaires' => $questionnaires
        ]);
    }

    public function create($id)
    {
        $questionnaire = Questionnaire::with(['questions' => function ($query) {
            $query->with(['q_radio_buttons', 'q_check_boxes', 'question_type']);
        }])->find($id);

        return view('questionnaire.answer', [
            'questionnaire' => $questionnaire
        ]);
    }

    public function store(Request $request)
    {

        $answer=Questionnaire::find($request['questionnaire_id'])->answers()->create();

        foreach($request->questions as $table){
            switch(Question_type::find($table['question_type_id'])['question_type_name']){
            case 'radio_button':
                $answer->a_radio_buttons()->create([
                    'question_id' => $table['question_id'],
                    'q_radio_button_id' => $table['q_radio_button_id'],
                ]);
                break;
            case 'check_box':
                foreach($table['q_check_box_id'] as $q_cb_id){
                    $answer->a_check_boxes()->create([
                        'question_id' => $table['question_id'],
                        'q_check_box_id' => $q_cb_id,
                    ]);
                }
                break;
            case 'pull_down':
                break;
            case 'free_form':
                $answer->a_free_forms()->create([
                    'question_id' => $table['question_id'],
                    'a_free_form_text' => $table['a_free_form_text'],
                ]);
                break;
            default:
                break;
            }
        }
        return redirect()->route('answer.submitted');
    }

    public function submitted()
    {
        return view('questionnaire.submitted');
    }
}
