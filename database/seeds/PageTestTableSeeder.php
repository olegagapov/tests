<?php

use Illuminate\Database\Seeder;
use App\Models\_Test\Admin\Link\PageTest;

class PageTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $countTest = CountString::$countTests;
        $countPages = CountString::$countPages;

        for ($t = 0; $t < $countTest; $t++) {
            $tt = $t + 1;
            for ($p = 1; $p <= $countPages; $p++) {
                $PageTest = PageTest::where('page_id', '=', $p)
                    ->where('t_test_id', '=', $tt)
                    ->first();
                if ($PageTest  === null && $tt >= $p) {
                    $PageTest = PageTest::create([
                        'page_id' => $p,
                        't_test_id' => $tt,

                        'comment' => ($t * $countPages + $p).'.comment - ' . $tt.' - '.$p,
                        'description' => ($t * $countPages + $p).'.description - ' . $tt.' - '.$p,

                        'active' => 1,
                        'published_at' => now()

                    ]);

                    $PageTest->save();
                }
            }
        }
    }
}
