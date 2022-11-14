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
            Schema::table('customers', function (Blueprint $table) {
                $table->softDeletes();
            });
            Schema::table('customer_contacts', function (Blueprint $table) {
                $table->softDeletes();
            });
            Schema::table('areas', function (Blueprint $table) {
                $table->softDeletes();
            });
            Schema::table('drivers', function (Blueprint $table) {
                $table->softDeletes();
            });
            Schema::table('address_books', function (Blueprint $table) {
                $table->softDeletes();
            });
            Schema::table('jobs', function (Blueprint $table) {
                $table->softDeletes();
                $table->foreignId('deleted_by')->nullable()->after('updated_by')->referances('id')->constrained('users');
            });
            Schema::table('daily_jobs', function (Blueprint $table) {
                $table->softDeletes();
            });
            Schema::table('job_addresses', function (Blueprint $table) {
                $table->softDeletes();
            });
            Schema::table('job_assigns', function (Blueprint $table) {
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
            Schema::table('customers', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
            Schema::table('areas', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
            Schema::table('customer_contacts', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
            Schema::table('drivers', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
            Schema::table('address_books', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropSoftDeletes();
                $table->dropConstrainedForeignId('deleted_by');
            });
            Schema::table('daily_jobs', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
            Schema::table('job_addresses', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
            Schema::table('job_assigns', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
    }
};
