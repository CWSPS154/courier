<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('order_job_id')->nullable()->constrained('order_jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('address_book_id')->nullable()->constrained('address_books')->nullOnDelete();
            $table->string('type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('street_address')->nullable();
            $table->string('street_number')->nullable();
            $table->string('suburb')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->longText('place_id')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('location_url')->nullable();
            $table->text('full_json_response')->nullable();
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
        Schema::dropIfExists('job_addresses');
    }
}
