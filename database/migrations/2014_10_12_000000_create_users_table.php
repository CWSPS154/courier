<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_seen')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreignUuid('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignUuid('deleted_by')->nullable()->constrained('users')->nullOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('deleted_by');
        });

    }
}
