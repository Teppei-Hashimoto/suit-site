<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Q_radio_button extends Model
{
    use HasFactory;

    protected $fillable =[
        'q_radio_button_text'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
