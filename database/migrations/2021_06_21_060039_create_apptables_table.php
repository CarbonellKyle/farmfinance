<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateApptablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id('season_id');
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('end_date')->nullable();
        });

        Schema::create('taxes', function (Blueprint $table) {
            $table->id('tax_id');
            $table->unsignedBigInteger('season_id')->nullable();
            $table->foreign('season_id')->references('season_id')->on('seasons')->onUpdate('cascade')->onDelete('set null');
            $table->string('name', 50);
            $table->integer('amount');
            $table->timestamp('date')->useCurrent();
        });

        Schema::create('material_expenses', function (Blueprint $table) {
            $table->id('material_expense_id');
            $table->unsignedBigInteger('season_id')->nullable();
            $table->foreign('season_id')->references('season_id')->on('seasons')->onUpdate('cascade')->onDelete('set null');
            $table->string('name', 50);
            $table->integer('quantity');
            $table->integer('cost');
            $table->timestamp('date')->useCurrent();
        });

        Schema::create('laborers', function (Blueprint $table) {
            $table->id('laborer_id');
            $table->string('name', 50);
            $table->string('address', 50);
        });

        Schema::create('labor_wages', function (Blueprint $table) {
            $table->id('labor_wage_id');
            $table->unsignedBigInteger('season_id')->nullable();
            $table->foreign('season_id')->references('season_id')->on('seasons')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('laborer_id')->nullable();
            $table->foreign('laborer_id')->references('laborer_id')->on('laborers')->onUpdate('cascade')->onDelete('set null');
            $table->integer('wage');
            $table->timestamp('date')->useCurrent();
        });

        Schema::create('revenues', function (Blueprint $table) {
            $table->id('revenue_id');
            $table->unsignedBigInteger('season_id')->nullable();
            $table->foreign('season_id')->references('season_id')->on('seasons')->onUpdate('cascade')->onDelete('set null');
            $table->string('unit', 50);
            $table->integer('quantity');
            $table->integer('price_per_unit');
            $table->integer('total_price');
            $table->timestamp('date')->useCurrent();
        });

        Schema::create('yields', function (Blueprint $table) {
            $table->id('yield_id');
            $table->unsignedBigInteger('season_id')->nullable();
            $table->foreign('season_id')->references('season_id')->on('seasons')->onUpdate('cascade')->onDelete('set null');
            $table->string('unit');
            $table->integer('quantity');
            $table->timestamp('date')->useCurrent();
        });

        /*Schema::create('reminders', function (Blueprint $table) {
            $table->id('reminder_id');
            $table->string('reminder');
        });*/

        Schema::create('appdata', function (Blueprint $table) {
            $table->id('appdata_id');
            $table->string('key');
            $table->string('value');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('taxes');
        Schema::dropIfExists('materialExpenses');
        Schema::dropIfExists('laborers');
        Schema::dropIfExists('laborWages');
        Schema::dropIfExists('revenues');
        Schema::dropIfExists('yields');
    }
}
