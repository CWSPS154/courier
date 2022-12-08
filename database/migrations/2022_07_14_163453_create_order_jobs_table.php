<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('customer_contact_id')->nullable()->constrained('customer_contacts')->nullOnDelete();
            $table->foreignUuid('from_area_id')->nullable()->constrained('areas')->nullOnDelete();
            $table->foreignUuid('to_area_id')->nullable()->constrained('areas')->nullOnDelete();
            $table->foreignUuid('timeframe_id')->nullable()->constrained('time_frames')->nullOnDelete();
            $table->string('notes')->nullable();
            $table->boolean('van_hire')->default(false);
            $table->integer('number_box')->nullable();
            $table->string('job_increment_id')->nullable();
            $table->foreignUuid('status_id')->nullable()->constrained('job_status')->nullOnDelete();
            $table->foreignUuid('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignUuid('deleted_by')->nullable()->constrained('users')->nullOnDelete();
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
        Schema::dropIfExists('jobss');
    }
}
