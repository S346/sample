<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSchedulesTable extends Migration
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
            $table->dropColumn('date');
            $table->dateTime('open')->nullable()->change();;
            $table->dateTime('start')->nullable()->change();;

            $table->text('body')->nullable()->change();
            $table->integer('charge')->nullable()->change();
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
            $table->date('date')->default('2000-01-01');
            $table->time('open')->default('00:00:00')->change();
            $table->time('start')->default('00:00:00')->change();

            $table->text('body')->nullable(false)->change();
            $table->integer('charge')->nullable(false)->change();
        });
    }
}
