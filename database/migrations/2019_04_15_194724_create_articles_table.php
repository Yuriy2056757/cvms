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
      $table->bigIncrements('id')->unique()->index();
      $table->foreign('user_id')->references('id')->on('users');
      $table->string('article_name');
      $table->string('slug')->index();
      $table->string('header_title');
      $table->text('body');
      $table->string('seo_title', 70);
      $table->string('meta_description', 150);
      $table->boolean('is_active')->default(0);
      $table->timestamps();
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
