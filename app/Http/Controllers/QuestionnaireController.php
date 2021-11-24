<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire\Questionnaire;
use App\Models\Questionnaire\Q_check_box;
use App\Models\Questionnaire\Q_radio_button;
use App\Models\Questionnaire\Question;
use App\Models\Questionnaire\Question_type;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        // 編集が必要
        $this->middleware(['auth'])->only(['store']);
    }

    public function index()
    {
        $questionnaires = Questionnaire::latest()->get();
        return view('questionnaire.info', [
            'questionnaires' => $questionnaires
        ]);
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $questionnaire_id = $request->user()->questionnaires()->create([
            'questionnaire_title' => $request['title'],
            'questionnaire_summary' => $request['summary']
        ])['id'];

        for($i = 1; $i <= $data['q_num']; $i++){
            $q_num =str_pad($i, 2, '0', STR_PAD_LEFT);
            $question_type_id=Question_type::where('question_type_name',$data["q{$q_num}_type"])->first()['id'];

            $required = array_key_exists("q{$q_num}_required", $data) ? 1 : 0;

            $question_id = Question::insertGetId([
                'questionnaire_id' => $questionnaire_id,
                'question_content' => $data["q{$q_num}"],
                'question_required' => $required,
                'question_type_id' => $question_type_id,
            ],'id');

            switch($data["q{$q_num}_type"]){
                case 'radio_button':
                    for($j = 1; $j <=$data["q{$q_num}_choice_num"]; $j++){
                        $t_num =str_pad($j, 2, '0', STR_PAD_LEFT);
                        if (array_key_exists("q{$q_num}_rb{$t_num}", $data)){
                            Q_radio_button::insert([
                                'question_id' => $question_id,
                                'q_radio_button_text' => $data["q{$q_num}_rb{$t_num}"]
                            ]);
                        }
                    }
                    break;
                case 'check_box':
                    for($j = 1; $j <=$data["q{$q_num}_choice_num"]; $j++){
                        $t_num =str_pad($j, 2, '0', STR_PAD_LEFT);
                        if (array_key_exists("q{$q_num}_cb{$t_num}", $data)){
                            Q_check_box::insert([
                                'question_id' => $question_id,
                                'q_check_box_text' => $data["q{$q_num}_cb{$t_num}"]
                            ]);
                        }
                    }
                    break;
                case 'free_form':
                    break;
                default:
                    break;
            }
        }

        return redirect()->route('questionnaires.info');
    }
}
