<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiteLayoutTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('isite__layout_translations', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your translatable fields
      $table->string('title',255);
      
      $table->integer('layout_id')->unsigned();
      $table->string('locale')->index();
      $table->unique(['layout_id', 'locale']);
      $table->foreign('layout_id')->references('id')->on('isite__layouts')->onDelete('cascade');
    });
  }
  
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('isite__layout_translations', function (Blueprint $table) {
      $table->dropForeign(['layout_id']);
    });
    Schema::dropIfExists('isite__layout_translations');
  }
}
