<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_properties', function (Blueprint $table) {
            $table->id();
            $table->integer('previous_sms_balance')->default(0)->nullable();
            $table->integer('last_sms_used')->default(0)->nullable();
            $table->integer('sms_balance')->default(0)->nullable();
            $table->string('bkg_color')->nullable();
            $table->date('last_login')->nullable();
            $table->integer('last_user')->nullable();
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
        Schema::dropIfExists('system_properties');
    }
};
