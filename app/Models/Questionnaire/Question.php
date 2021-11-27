<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;

    protected $fillable =[
        'question_type_id',
        'question_content',
        'question_required'
    ];


    public function question_type(){
        return $this->belongsTo(Question_type::class);
    }
    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }
    
    public function q_check_boxes(){
        return $this->hasMany(Q_check_box::class);
    }
    public function q_radio_buttons(){
        return $this->hasMany(Q_radio_button::class);
    }


    public function a_check_boxes(){
        return $this->hasMany(A_check_box::class);
    }
    public function a_radio_buttons(){
        return $this->hasMany(A_radio_button::class);
    }
    public function a_free_forms(){
        return $this->hasMany(A_free_form::class);
    }


}
