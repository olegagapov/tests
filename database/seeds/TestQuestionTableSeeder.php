<?php

use Illuminate\Database\Seeder;
use App\Models\_Test\Admin\Link\TestQuestion;

class TestQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $countTest = CountString::$countTests;
        $countQuestions = CountString::$countQuestions;

        for ($t = 0; $t < $countTest; $t++) {
            $tt = $t + 1;
            for ($q = 1; $q <= $countQuestions; $q++) {
                $TestQuestion = TestQuestion::where('t_question_id', '=', $q)
                    ->where('t_test_id', '=', $tt)
                    ->first();
                if ($TestQuestion  === null) {
                    $TestQuestion = TestQuestion::create([
                        't_question_id' => $q,
                        't_test_id' => $tt,

                        'comment' => ($t * $countQuestions + $q).'.comment - ' . $tt.' - '.$q,
                        'description' => ($t * $countQuestions + $q).'.description - ' . $tt.' - '.$q,

                        'active' => 1,
                        'published_at' => now()

                    ]);

                    $TestQuestion->save();
                }
            }
        }
    }
}
