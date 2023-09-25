<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('isite__layout_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('title', 255);

            $table->integer('layout_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['layout_id', 'locale']);
            $table->foreign('layout_id')->references('id')->on('isite__layouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('isite__layout_translations', function (Blueprint $table) {
            $table->dropForeign(['layout_id']);
        });
        Schema::dropIfExists('isite__layout_translations');
    }
};
