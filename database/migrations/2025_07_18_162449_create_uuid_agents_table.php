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
        Schema::create('uuid_agents', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('provider_name');

            $table->timestamps();
        });

        // alter the table the_agents and add the missing columns
        Schema::table('the_agents', function (Blueprint $table) {
            $table->string('name');
            $table->string('provider_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uuid_agents');
    }
};
