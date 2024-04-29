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
        Schema::create('encrypted_messages', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_email');
            $table->text('encrypted_message');
            $table->string('encryption_key', 10);
            $table->integer('expire_in_hours');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encrypted_messages');
    }
};
