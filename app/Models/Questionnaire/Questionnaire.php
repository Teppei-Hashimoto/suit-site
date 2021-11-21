<?php

namespace App\Models\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionnaire extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'questionnaire_title',
        'questionnaire_content'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
