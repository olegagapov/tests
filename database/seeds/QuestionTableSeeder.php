<?php

use Illuminate\Database\Seeder;
use App\Models\_Test\Admin\Question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $count = CountString::$countQuestions;
            $ar = $this->getAr();
        for ($i = 1, $ii = 1; $i <= $count; $i++, $ii++) {
            if ($ii > 3) {
                $ii = 1;
            }

            if ((Question::where('id', '=', $i)->first()) === null) {
                $Question = Question::create([
                    'user_id' => '1',
                    'grade_id' => $ii ,
                    'subject_id' => $ii,
                    'page_id' => $ii,
                    'name' => ($i) . '-й вопрос',
                    'slug' => str_slug(($i) . '-й вопрос', '_', 'en'),


                    'text_input' => $ar['input'][$ii-1],
                    'text_html' => $ar['html'][$ii-1],

                    'difficulty' => 0,
                    'difficulty_2' => 0,
                    'difficulty_3' => 0,


                    'comment' => 'comment - ' . $i,
                    'description' => 'description - ' . $i,


                    'active' => 1,
                    'published_at' => now()

                ]);

                $Question->save();
            }
        }
    }

    public function getAr()
    {
        $ar['input'] = [
                'Два равных отрезка ',
                'Выберите из предложенных натуральные',
                'Выберите числа соответствующие названиям. '
        ];
        $ar['html'] = [
            '<div class="textzadachi" id="idtextzadachi_5">1. Один равных отрезка &nbsp; </div>',
            '<div class="textzadachi" id="idtextzadachi_5">2. Два равных отрезка &nbsp; </div>',
            '<div class="textzadachi" id="idtextzadachi_5">3. Три равных отрезка &nbsp; </div>'
            ];
        return $ar;
    }
}
