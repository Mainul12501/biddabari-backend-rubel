<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('question_topics', function (Blueprint $table) {
//            $table
//                ->foreign('question_topic_id')
//                ->references('id')
//                ->on('question_topics')
//                ->onUpdate('CASCADE')
//                ->onDelete('CASCADE');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_topics', function (Blueprint $table) {
            $table->dropForeign(['question_topic_id']);
        });
    }
};
