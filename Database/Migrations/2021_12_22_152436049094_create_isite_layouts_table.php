<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiteLayoutsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('isite__layouts', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your fields...
      $table->string('system_name',255);
      $table->string('module_name',255);
      $table->string('entity_name',255);
      $table->string('entity_type',255)->nullable();
      $table->string('path',255);
      $table->integer('status')->default(1);
      $table->string('record_type')->index()->nullable();
      
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
    Schema::dropIfExists('isite__layouts');
  }
}
