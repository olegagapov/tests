<?php
//namespace database\migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionTest extends Migration
{

    /**
     *
     */
    public function up()
    {
        Schema::create('test_grades', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable()->comment('id создателя, редактора');
            $table->smallInteger('name')->unique()->comment('класс');


            $table->string('comment')->default('')->comment('комментарий');
            $table->text('description')->comment('описание');
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('active', 'idx-page-active');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->engine = 'InnoDB';
        });
        Schema::create('test_subjects', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable()->comment('id создателя, редактора');
            $table->string('name')->unique()->comment('предмет');
            $table->string('name_english')->unique()->comment('предмет на английском');


            $table->string('comment')->default('')->comment('комментарий');
            $table->text('description')->comment('описание');
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('active', 'idx-page-active');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->engine = 'InnoDB';
        });

        Schema::create('test_pages', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable()->comment('id создателя, редактора');
            $table->string('name')->unique()->comment('название');
            $table->string('slug')->unique();

            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('page_id')->unsigned()->nullable()->comment('');
            $table->smallInteger('number_page')->comment('');

            $table->string('section_name')->comment('');
            $table->string('title_meta')->comment('');
            $table->string('keywords_meta')->comment('');
            $table->string('description_meta')->comment('');
            $table->longText('rules_text')->comment('правила в текстовом виде');
            $table->longText('rules_html')->comment('правила в виде html');


            $table->smallInteger('countest_tests')->comment('');


            $table->string('comment')->default('')->comment('комментарий');
            $table->text('description')->comment('описание');
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('active', 'idx-page-active');
            $table->unique(['grade_id', 'subject_id', 'page_id', 'number_page']);

            $table->index('grade_id', 'idx-page-grade_id');
            $table->index('subject_id', 'idx-page-subject_id');
            $table->index('page_id', 'idx-page-page_id');


            $table->foreign('grade_id')->references('id')->on('test_grades')->onDelete('restrict');
            $table->foreign('subject_id')->references('id')->on('test_subjects')->onDelete('restrict');
            $table->foreign('page_id')->references('id')->on('test_pages');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });

        Schema::create('test_questions', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable()->comment('id создателя, редактора');
            $table->string('name')->default('')->comment('название');
            $table->string('slug')->unique();



            $table->bigInteger('grade_id')->unsigned()->nullable();
            $table->bigInteger('subject_id')->unsigned()->nullable();
            $table->bigInteger('page_id')->unsigned()->nullable();

            $table->longText('text_input')->comment('начально введеный текст вопроса и ответов');
            $table->longText('text_html')->comment('html текст вопроса и ответов');

            $table->bigInteger('difficulty')->unsigned()->default(0)->comment('сложность вопроса и ответов');
            $table->bigInteger('difficulty_2')->unsigned()->default(0)->comment('сложность вопроса и ответов методика-2');
            $table->bigInteger('difficulty_3')->unsigned()->default(0)->comment('сложность вопроса и ответов методика-3');

            $table->integer('count_show')->unsigned()->nullable()->comment('кол-во показов');
            $table->integer('count_true')->unsigned()->nullable()->comment('кол-во верных ответов');
            $table->integer('count_false')->unsigned()->nullable()->comment('кол-во неверных ответов');
            $table->smallInteger('time_answer')->unsigned()->nullable()->comment('среднее время ответа');

            $table->integer('count_show_reg')->unsigned()->nullable()->comment('кол-во показов');
            $table->integer('count_true_reg')->unsigned()->nullable()->comment('кол-во верных ответов');
            $table->integer('count_false_reg')->unsigned()->nullable()->comment('кол-во неверных ответов');
            $table->smallInteger('time_answer_reg')->unsigned()->nullable()->comment('среднее время ответа');

            $table->string('comment')->default('')->comment('комментарий');
            $table->text('description')->comment('описание');
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('active', 'idx-question-active');


            $table->index('grade_id', 'idx-question-grade_id');
            $table->index('subject_id', 'idx-question-subject_id');
            $table->index('page_id', 'idx-question-page_id');

            $table->foreign('grade_id')->references('id')->on('test_grades')->onDelete('restrict');
            $table->foreign('subject_id')->references('id')->on('test_subjects')->onDelete('restrict');
            $table->foreign('page_id')->references('id')->on('test_pages')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });



        Schema::create('test_tests', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable()->comment('id создателя, редактора');
            $table->string('name')->default('')->comment('название');
            $table->string('slug')->unique();


            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('page_id')->unsigned();

            $table->string('text_input')->default('')->comment('начально введеный текст вопроса и ответов');
            $table->string('text_html')->default('')->comment('html текст вопроса и ответов');

            $table->string('difficulty')->default('')->comment('сложность вопроса и ответов');
            $table->string('difficulty_2')->default('')->comment('сложность вопроса и ответов методика-2');
            $table->string('difficulty_3')->default('')->comment('сложность вопроса и ответов методика-3');

            $table->integer('count_show')->unsigned()->nullable()->comment('кол-во показов');
            $table->integer('count_true')->unsigned()->nullable()->comment('кол-во верных ответов');
            $table->integer('count_false')->unsigned()->nullable()->comment('кол-во неверных ответов');
            $table->smallInteger('time_answer')->unsigned()->nullable()->comment('среднее время ответа');

            $table->integer('count_show_reg')->unsigned()->nullable()->comment('кол-во показов');
            $table->integer('count_true_reg')->unsigned()->nullable()->comment('кол-во верных ответов');
            $table->integer('count_false_reg')->unsigned()->nullable()->comment('кол-во неверных ответов');
            $table->smallInteger('time_answer_reg')->unsigned()->nullable()->comment('среднее время ответа');

            $table->string('comment')->default('')->comment('комментарий');
            $table->text('description')->comment('описание');
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('active', 'idx-test-active');

            $table->index('grade_id', 'idx-test-grade_id');
            $table->index('subject_id', 'idx-test-subject_id');
            $table->index('page_id', 'idx-question-page_id');

            $table->foreign('grade_id')->references('id')->on('test_grades')->onDelete('restrict');
            $table->foreign('subject_id')->references('id')->on('test_subjects')->onDelete('restrict');
            $table->foreign('page_id')->references('id')->on('test_pages')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });



        Schema::create('test_link_test_questions', function (Blueprint $table) {

            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();

            $table->string('comment')->default('')->comment('комментарий');
            $table->string('description')->default('')->comment('описание');
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['question_id', 'test_id']);

            $table->index('question_id', 'idx-question-question_id');
            $table->foreign('question_id')->references('id')->on('test_questions')->onDelete('restrict');

            $table->index('test_id', 'idx-test-test_id');
            $table->foreign('test_id')->references('id')->on('test_tests')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });



        Schema::create('test_link_page_questions', function (Blueprint $table) {

            $table->bigInteger('page_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();

            $table->string('comment')->default('')->comment('комментарий');
            $table->string('description')->default('')->comment('описание');
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['question_id', 'page_id']);

            $table->index('question_id', 'idx-question-question_id');
            $table->foreign('question_id')->references('id')->on('test_questions')->onDelete('restrict');

            $table->index('page_id', 'idx-page-page_id');
            $table->foreign('page_id')->references('id')->on('test_pages')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });


        Schema::create('test_link_page_tests', function (Blueprint $table) {

            $table->bigInteger('page_id')->unsigned();
            $table->bigInteger('test_id')->unsigned();

            $table->string('comment')->default('')->comment('комментарий');
            $table->string('description')->default('')->comment('описание');
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['test_id', 'page_id']);

            $table->index('test_id', 'idx-test-test_id');
            $table->foreign('test_id')->references('id')->on('test_tests')->onDelete('restrict');

            $table->index('page_id', 'idx-page-page_id');
            $table->foreign('page_id')->references('id')->on('test_pages')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });
    }
    public function down()
    {
        Schema::dropIfExists('link_page_test');
        Schema::dropIfExists('link_test_question');
        Schema::dropIfExists('link_page_question');
        Schema::dropIfExists('test_questions');
        Schema::dropIfExists('test_tests');
        Schema::dropIfExists('test_pages');
        Schema::dropIfExists('test_grades');
    }
}
