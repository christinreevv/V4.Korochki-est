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
        Schema::create('applications', function (Blueprint $table) {

            $table->id();

            // пользователь

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // название курса

            $table->string('course_name');

            // дата начала

            $table->date('start_date');

            // способ оплаты

            $table->string('payment_method');

            // статус

            $table->string('status')
                ->default('Новая');

            // отзыв

            $table->text('review')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
