<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueid');
            $table->string('title')->nullable();
            $table->string('fullname');
            $table->text('bio')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('gender',['Male','Female','Not Specified']);
            $table->enum('status',[1,0]);
            $table->enum('usertype',['admin','retailer','distributor']);
            $table->text('privilege')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->text('facebook_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('linkedin_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
