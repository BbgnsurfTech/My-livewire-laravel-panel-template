<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTestAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('test_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('test_result_id');
            $table->foreign('test_result_id', 'test_result_fk_5082263')->references('id')->on('test_results');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id', 'question_fk_5082264')->references('id')->on('questions');
            $table->unsignedBigInteger('option_id');
            $table->foreign('option_id', 'option_fk_5082265')->references('id')->on('question_options');
        });
    }
}
