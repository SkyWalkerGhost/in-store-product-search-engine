<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production', function (Blueprint $table) {

            $table->id();
            $table->string('productionid');
            $table->string('production_name');
            $table->string('barcode');
            $table->string('category');
            $table->longText('description');
            $table->string('production_image');
            $table->string('number_of_product');
            $table->decimal('production_price', 12,2);
            $table->decimal('discount', 12,2);
            $table->string('user_id');
            $table->timestamp('release_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('expiration_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->charset     = 'utf8';   
            $table->collation   = 'utf8_general_ci'; 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production');
    }
}
