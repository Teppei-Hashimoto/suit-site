<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class A_free_form extends Model
{
    use HasFactory;

    protected $fillable =[
        'question_id',
        'a_free_form_text',
        'answer_id'
    ];
    public $timestamps = false;

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
