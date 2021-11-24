<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question_type extends Model
{
    use HasFactory;

    protected $fillable =[
        //
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
