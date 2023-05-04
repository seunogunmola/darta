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
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueid');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->enum('status',[1,0]);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributor');
    }
};
