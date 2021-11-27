<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class A_radio_button extends Model
{
    use HasFactory;

    protected $fillable =[
        'question_id',
        'q_radio_button_id',
    ];
    public $timestamps = false;

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function q_radio_button(){
        return $this->belongsTo(Q_radio_button::class);
    }

}
