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
        Schema::create('isite__synchronizables', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('sheet_id')->nullable();
            $table->string('name');
            // 'Enabled' indicates that migrations are enabled for this module
            $table->boolean('enabled')->default(0);
            // 'is_running' indicates that a migration is currently running
            $table->boolean('is_running')->default(0);
            $table->text('enabled_emails')->nullable();
            $table->timestamp('last_sync')->nullable()->default(null);
            $table->integer('exported_by_id')->nullable();
            // Audit fields
            $table->timestamps();
            $table->auditStamps();
            $table->unique(['name', 'organization_id'])->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isite__synchronizables');
    }
};
