<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('rating_value');
            $table->unsignedInteger('item_id')->length(10);
            $table->smallInteger('created_by');
            $table->smallInteger('modified_by');
            $table->timestamps();
        });

        Schema::table('ratings', function(Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
        // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}
