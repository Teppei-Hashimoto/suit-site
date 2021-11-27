<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable =[
        'questionnaire_id'
    ];

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }
    public function a_radio_buttons(){
        return $this->hasMany(A_radio_button::class);
    }
    public function a_check_boxes(){
        return $this->hasMany(A_check_box::class);
    }
    public function a_free_forms(){
        return $this->hasMany(A_free_form::class);
    }

}
