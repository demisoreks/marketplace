<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuration', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('contact_address')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email');
            $table->text('logo_url');
            $table->string('colour1');
            $table->string('colour2');
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
        Schema::dropIfExists('configuration');
    }
}
