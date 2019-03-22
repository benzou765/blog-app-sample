<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('post_date');
            $table->tinyInteger('recommended');
            $table->string('title')->charset('utf8mb4');
            $table->text('body')->charset('utf8mb4');
            $table->softDeletes();
            $table->timestamps();

            $table->index('post_date', 'post_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
