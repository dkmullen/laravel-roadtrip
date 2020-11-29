<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

      // this created the pivot table that is needed to have many to many relationship
        // conventional naming is to use the two table names in alpha order separated by a _ - article_tag
        Schema::create('article_tag', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('article_id');
          $table->unsignedBigInteger('tag_id');
          $table->timestamps();

          $table->unique(['article_id', 'tag_id']); // avoid duplicates

          $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
          $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
