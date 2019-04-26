<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiteSiteTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isite__site_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('site_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['site_id', 'locale']);
            $table->foreign('site_id')->references('id')->on('isite__sites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isite__site_translations', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
        });
        Schema::dropIfExists('isite__site_translations');
    }
}
