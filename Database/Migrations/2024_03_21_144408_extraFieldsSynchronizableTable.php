<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtraFieldsSynchronizableTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('isite__synchronizables', function (Blueprint $table) {
      $table->text('base_template_id')->nullable()->after('sheet_id');
      $table->text('errors')->nullable()->after('exported_by_id');
      $table->text('options')->nullable()->after('is_running');
      $table->text('sheets')->nullable()->after('is_running');
      $table->renameColumn('sheet_id', 'spreadsheet_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('isite__synchronizables', function (Blueprint $table) {
      $table->dropColumn('errors');
      $table->dropColumn('options');
      $table->dropColumn('sheets');
      $table->dropColumn('template_id');
      $table->renameColumn('spreadsheet_id', 'sheet_id');
    });
  }
}