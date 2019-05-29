<?php

use Illuminate\Database\Seeder;
use App\Models\_Test\Admin\Grade;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seededId = '1';
        $class = Grade::where('id', '=', $seededId)->first();
        if ($class === null) {
            for ($i = 0; $i < 4; $i++) {
                $class = Grade::create([
                    'user_id' => '1',
                    'name' => $i + 5,
                    'comment' => 'comment - ' . $i,
                    'description' => 'description - ' . $i,
                    'active' => 1,
                    'published_at' => now()

                ]);

                $class->save();
            }
        }
    }
}
