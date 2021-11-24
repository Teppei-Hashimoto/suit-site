<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Questionnaire\Question_type;

class Question_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question_type::insert([
            [
            'question_type_name'=>'radio_button'
            ],
            [
                'question_type_name'=>'check_box'
            ],
            [
                'question_type_name'=>'pull_down'
            ],
            [
                'question_type_name'=>'free_form'
            ],
            [
                'question_type_name'=>'date'
            ],
        ]);
    }
}
