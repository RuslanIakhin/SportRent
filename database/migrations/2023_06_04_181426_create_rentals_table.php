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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('renter_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->enum('status', [
                'Новая',
                'Отклонена',
                'Принята',
                'Оплачена',
                'Спорная ситуация',
                'Завершена'
            ])->default('Новая');
            $table->unsignedDecimal('price');
            $table->boolean('confirmation_lessor')->default(false);
            $table->boolean('confirmation_renter')->default(false);
            $table->foreignId('payment_card_id')->references('id')->on('cards')->onDelete('cascade')->onUpdate('cascade')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
