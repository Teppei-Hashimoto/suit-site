<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire\Questionnaire;
use App\Models\Questionnaire\Question_type;
use App\Models\Questionnaire\A_check_box;
use App\Models\Questionnaire\A_free_form;
use App\Models\Questionnaire\A_radio_button;
use App\Models\Questionnaire\Answer;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::latest()->get();
        return view('questionnaire.index', [
            'questionnaires' => $questionnaires
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // idをもとに質問データ取得
        $questionnaire = Questionnaire::with(['questions' => function ($query) {
            $query->with(['q_radio_buttons', 'q_check_boxes', 'question_type']);
        }])->find($id);
        // dd($questionnaire);

        return view('questionnaire.answer', [
            'questionnaire' => $questionnaire
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer_id=Answer::create(['questionnaire_id' => $request['questionnaire_id']])->id;
        foreach($request->questions as $table){
            $type_name=Question_type::where('id',$table['question_type_id'])->first()['question_type_name'];
            switch($type_name){
            case 'radio_button':
                A_radio_button::insert([
                    'question_id' => $table['question_id'],
                    'q_radio_button_id' => $table['q_radio_button_id'],
                    'answer_id' => $answer_id,
                ]);
                break;
            case 'check_box':
                foreach($table['q_check_box_id'] as $q_cb_id){
                    A_check_box::insert([
                        'question_id' => $table['question_id'],
                        'q_check_box_id' => $q_cb_id,
                        'answer_id' => $answer_id,
                    ]);
                }
                break;
            case 'pull_down':
                break;
            case 'free_form':
                A_free_form::insert([
                    'question_id' => $table['question_id'],
                    'a_free_form_text' => $table['a_free_form_text'],
                    'answer_id' => $answer_id,
                ]);
                break;
            default:
                break;
            }
        }
        return redirect()->route('questionnaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
