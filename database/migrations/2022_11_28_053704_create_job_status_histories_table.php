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
        Schema::create('job_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_job_id')->nullable()->referances('id')->constrained('order_jobs');
            $table->foreignId('user_id')->nullable()->referances('id')->constrained('users');
            $table->foreignId('from_status_id')->nullable()->referances('id')->constrained('job_status');
            $table->foreignId('to_status_id')->nullable()->referances('id')->constrained('job_status');
            $table->string('photo')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('job_status_histories');
    }
};
