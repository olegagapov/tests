<?php

use Illuminate\Database\Seeder;
use App\Models\_Test\Admin\Subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $seededId = '1';
        $subject = Subject::where('id', '=', $seededId)->first();
        if ($subject === null) {
            $ar = ['математика', 'алгебра', 'русский язык'];
            $ar_english = ['matematika', 'algebra', 'russian'];
            for ($i = 0; $i < 3; $i++) {
                $subject = Subject::create([
                    'user_id' => '1',
                    'name' => $ar[$i],
                    'name_english' => $ar_english[$i],
                    'comment' => 'comment - ' . $i,
                    'description' => 'description - ' . $i,
                    'active' => 1,
                    'published_at' => now()

                ]);

                $subject->save();
            }
        }
    }
}
