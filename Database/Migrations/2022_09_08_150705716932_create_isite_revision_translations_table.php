<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiteRevisionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isite__revision_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('revision_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['revision_id', 'locale']);
            $table->foreign('revision_id')->references('id')->on('isite__revisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isite__revision_translations', function (Blueprint $table) {
            $table->dropForeign(['revision_id']);
        });
        Schema::dropIfExists('isite__revision_translations');
    }
}
