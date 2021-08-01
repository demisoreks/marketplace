<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConfigurationTable01 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configuration', function (Blueprint $table) {
            $table->decimal('vat_percent', 5, 2)->default(0)->after('colour2');
            $table->decimal('fixed_charge', 50, 2)->default(0)->after('vat_percent');
            $table->decimal('percent_charge', 50, 2)->default(0)->after('fixed_charge');
            $table->decimal('max_charge', 50, 2)->default(0)->after('percent_charge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuration', function (Blueprint $table) {
            //
        });
    }
}
