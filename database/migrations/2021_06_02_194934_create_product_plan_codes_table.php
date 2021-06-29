<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPlanCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_plan_codes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_plan_id')->unsigned();
            $table->foreign('product_plan_id')->references('id')->on('product_plans');
            $table->bigInteger('billing_interval_id')->unsigned();
            $table->foreign('billing_interval_id')->references('id')->on('billing_intervals');
            $table->text('code');
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
        Schema::dropIfExists('product_plan_codes');
    }
}
