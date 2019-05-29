<?php

use Illuminate\Database\Seeder;
use App\Models\_Test\Admin\Link\PageQuestion;

class PageQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $countPages = CountString::$countPages;
        $countQuestions = CountString::$countQuestions;

        for ($p = 0; $p < $countPages; $p++) {
            $pp = $p + 1;
            for ($q = 1; $q <= $countQuestions; $q++) {
                $PageQuestion = PageQuestion::where('t_question_id', '=', $q)
                    ->where('page_id', '=', $pp)
                    ->first();
                if ($PageQuestion  === null) {
                    $PageQuestion = PageQuestion::create([
                        't_question_id' => $q,
                        'page_id' => $pp,

                        'comment' => ($p * $countQuestions + $q).'.comment - ' . $pp.' - '.$q,
                        'description' => ($p * $countQuestions + $q).'.description - ' . $pp.' - '.$q,

                        'active' => 1,
                        'published_at' => now()

                    ]);

                    $PageQuestion->save();
                }
            }
        }
    }
}
