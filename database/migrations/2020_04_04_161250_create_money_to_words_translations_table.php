<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyToWordsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_to_words_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text')->index();
            $table->string('language')->index();
            $table->string('translation');
            $table->timestamps();

            $table->index(['text', 'language']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money_to_words_translations');
    }
}
