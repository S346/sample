<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSchedulesTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            //
            $table->datetime('date')->nullable()->default('9999-12-31 00:00:00');
            $table->datetime('open')->nullable()->default('9999-12-31 00:00:00')->change();
            $table->datetime('start')->nullable()->default('9999-12-31 00:00:00')->change();
            $table->integer('charge')->nullable()->change();
            $table->text('body')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            //
            $table->dropColumn('date')->change();
            $table->datetime('open')->nullable(false)->default('9999-12-31 00:00:00')->change();
            $table->datetime('start')->nullable(false)->default('9999-12-31 00:00:00')->change();
            $table->integer('charge')->nullable(false)->change();
            $table->text('body')->nullable(false)->change();
        });
    }
}
