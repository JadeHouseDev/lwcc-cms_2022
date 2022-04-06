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
        Schema::create('contribution_types', function (Blueprint $table) {
            $table->id();
            $table->string('con_type_id', 20);
            $table->tinyInteger('collected_by')->comment('Individual / Congregation');
            $table->string('comment');
            $table->boolean('active_status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contribution_types');
    }
};
