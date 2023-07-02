<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payke_statuses', function (Blueprint $table) {
            $table->id();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->enum("status", ["waiting", "picking", "delivering", "delivered"]);
            $table->foreignIdFor(\App\Models\Collection::class);
            $table->foreignIdFor(\App\Models\User::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payke_statuses');
    }
};
