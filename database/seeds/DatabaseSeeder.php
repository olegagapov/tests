<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(GradeTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(TestTableSeeder::class);
        $this->call(TestQuestionTableSeeder::class);
        $this->call(PageQuestionTableSeeder::class);
        $this->call(PageTestTableSeeder::class);
        //$this->call(UserAddRoleTableSeeder::class);//11??


    }
}
