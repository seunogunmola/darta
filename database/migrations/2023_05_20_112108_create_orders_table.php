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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueid');
            $table->unsignedBigInteger('retailer_id');
            $table->unsignedBigInteger('distributor_id')->nullable();
            $table->string('order_title');  
            $table->date('order_date');
            $table->date('disbursement_date')->nullable();
            $table->enum('status',['pending','declined','approved']);
            $table->text('status_note')->nullable();
            $table->enum('is_disbursed',[0,1]);
            $table->unsignedBigInteger('processed_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
