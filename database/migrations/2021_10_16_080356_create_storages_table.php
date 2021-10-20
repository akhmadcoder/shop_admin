<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->dateTime('date', $precision = 0);
            $table->unsignedBigInteger('item_id');
            $table->timestamps();
            $table->dateTime('admin_created_at', $precision = 0)->nullable()->default(null);
            $table->dateTime('admin_updated_at', $precision = 0)->nullable()->default(null);
            $table->foreign('item_id')->references('id')->on('items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storages');
    }
}
