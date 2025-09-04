<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isite__whatsapp_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('country_code');
            $table->integer('phone');
            $table->string('message')->nullable();
            $table->string('label')->nullable();

            $table->integer('whatsapp_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['whatsapp_id', 'locale']);
            $table->foreign('whatsapp_id')->references('id')->on('isite__whatsapps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isite__whatsapp_translations', function (Blueprint $table) {
            $table->dropForeign(['whatsapp_id']);
        });
        Schema::dropIfExists('isite__whatsapp_translations');
    }
};
