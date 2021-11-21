<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Q_pull_down extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'q_pull_down_text'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
