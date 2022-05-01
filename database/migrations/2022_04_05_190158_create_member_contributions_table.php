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
        Schema::create('member_contributions', function (Blueprint $table) {
            $table->id();
            $table->string('contrib_id');
            $table->decimal('amount');
            $table->date('date');
            $table->string('member_id', 20);
            $table->string('con_type_id', 20);
            $table->integer('reprocess_count')->default(0);
            $table->boolean('sms_sent')->default(0);
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
        Schema::dropIfExists('member_contributions');
    }
};
