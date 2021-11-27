<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class A_check_box extends Model
{
    use HasFactory;

    protected $fillable =[
        'question_id',
        'q_check_box_id',
    ];
    public $timestamps = false;
    
    public function answer(){
        return $this->belongsTo(Answer::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function q_check_box(){
        return $this->belongsTo(Q_check_box::class);
    }
}
