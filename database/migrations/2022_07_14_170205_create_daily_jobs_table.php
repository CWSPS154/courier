<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('order_job_id')->nullable()->constrained('order_jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('job_number')->nullable();
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
        Schema::dropIfExists('daily_jobs');
    }
}
