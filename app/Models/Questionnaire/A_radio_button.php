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
        'answer_id'
    ];

}
