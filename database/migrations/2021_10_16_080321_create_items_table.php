<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('SKU');
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->string('image');
            $table->timestamps();
            $table->dateTime('admin_created_at', $precision = 0)->nullable()->default(null);
            $table->dateTime('admin_updated_at', $precision = 0)->nullable()->default(null);
            
            $table->unsignedBigInteger('measure_id');
            $table->foreign('measure_id')->references('id')->on('measures');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
