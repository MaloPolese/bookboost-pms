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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->bigInteger('room_id')->unsigned()->index()->nullable();
            $table->string("source");
            $table->string("status");
            $table->string("segment");
            $table->dateTime("start");
            $table->dateTime("end");
            $table->dateTime("cancelled_at")->nullable();
            $table->dateTime("created_at_in_pms")->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("room_id")->references("id")->on("rooms")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
