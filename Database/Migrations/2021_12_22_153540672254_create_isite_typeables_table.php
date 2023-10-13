<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiteTypeablesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('isite__typeables', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your fields...
      $table->string('typeable_type',255);
      $table->integer('typeable_id');
      $table->string('layout_path',255);
      $table->integer('layout_id')->unsigned();
      $table->foreign('layout_id')->references('id')->on('isite__layouts')->onDelete('restrict');
      // Audit fields
      $table->timestamps();
      $table->auditStamps();
    });
  }
  
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('isite__typeables');
  }
}
