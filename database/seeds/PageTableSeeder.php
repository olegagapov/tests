<?php


use App\Models\_Test\Admin\Test;
use Illuminate\Database\Seeder;
use App\Models\_Test\Admin\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = CountString::$countPages;
        $seededId = '1';
        $Page = Page::where('id', '=', $seededId)->first();
        if ($Page === null || true) {
            for ($i = 1, $ii = 1; $i <= $count; $i++, $ii++) {

                if ($ii > 3) {
                    $ii = 1;
                }
                if ((Page::where('id', '=', $i)->first()) === null) {
                    $Page = Page::create([
                        'user_id' => '1',
                        'grade_id' => $ii,
                        'subject_id' => $ii,
                        //'page_id' => $i,
                        'name' => ' ' . ($i) . '. Название страницы - ' . ($i),
                        'slug' => str_slug(($i) . '. Название страницы - ' . ($i), '_', 'en'),

                        'number_page' => $i,
                        'section_name' => ' ' . $ii . '-й раздел',
                        'title_meta' => 'title_meta',
                        'keywords_meta' => 'keywords_meta',
                        'description_meta' => 'description_meta',
                        'rules_text' => $i . '-е правило',
                        'rules_html' => '<div>' . $i . '-е правило</div>',
                        'count_tests' => $ii,

                        'comment' => 'comment - ' . $i,
                        'description' => 'description - ' . $i,


                        'active' => 1,
                        'published_at' => now()

                    ]);

                    $Page->save();
                }
            }
        }
    }
}
