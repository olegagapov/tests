<?php

use Illuminate\Database\Seeder;
use App\Models\_Test\Admin\Test;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $count = CountString::$countTests;
            $ar = $this->getAr();
        for ($i = 1, $ii = 1; $i <= $count; $i++, $ii++) {
            if ($ii > 3) {
                $ii = 1;
            }

            if ((Test::where('id', '=', $i)->first()) === null) {
                $Test = Test::create([
                    'user_id' => '1',
                    'grade_id' => $ii ,
                    'subject_id' => $ii,
                    'page_id' => $ii,
                    'name' => ($i) . '-й тест',
                    'slug' => str_slug(($i) . '-й тест', '_', 'en'),


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

                $Test->save();
            }
        }
    }

    public function getAr()
    {
        $ar['input'] = [
                'Два равных отрезка и еще два раных ',
                'Выберите из предложенных натуральные',
                'Выберите числа соответствующие названиям. '
        ];
        $ar['html'] = [
            '<div class="textzadachi" id="idtextzadachi_5">Четыре равных отрезка</div>',
            '<div class="textzadachi" id="idtextzadachi_5">2. Два равных отрезка</div>',
            '<div class="textzadachi" id="idtextzadachi_5">3. Три равных отрезка</div>'
            ];
        return $ar;
    }
}
