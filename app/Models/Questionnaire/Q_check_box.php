<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Q_check_box extends Model
{
    use HasFactory;

    protected $fillable =[
        'q_check_box_text'
    ];
    public $timestamps = false;

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function a_check_boxes(){
        return $this->hasMany(A_check_box::class);
    }

}
