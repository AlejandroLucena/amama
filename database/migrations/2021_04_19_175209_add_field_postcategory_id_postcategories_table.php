<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldPostcategoryIdpostcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('postcategories', function (Blueprint $table) {
            $table->unsignedBigInteger('postcategory_id')->nullable()->default(null);
            $table->foreign('postcategory_id')->references('id')->on('postcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
