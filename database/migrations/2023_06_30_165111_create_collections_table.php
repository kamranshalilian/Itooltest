<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->double('pickup_longitude');
            $table->double('pickup_latitude');
            $table->string('pickup_address');
            $table->string('pickup_name');
            $table->string('pickup_phone');
            $table->double('deliver_longitude');
            $table->double('deliver_latitude');
            $table->string('deliver_address');
            $table->string('deliver_name');
            $table->string('deliver_phone');
            $table->enum('status', ["pending", "pickling", "picked", "delivering","delivered", "success", "cancel", "fail"]);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
