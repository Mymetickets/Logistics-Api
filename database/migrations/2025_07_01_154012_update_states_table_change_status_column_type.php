<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('states', function (Blueprint $table) {
            // Changing the 'status' column from boolean to string.
            // Defining a suitable length for the string, e.g., 50 characters.
            // Setting a default value, matching the enum.
            $table->string('status', 50)->default(StatusEnum::ACTIVE->value)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('states', function (Blueprint $table) {
            // Revert the 'status' column back to boolean on rollback.
            // Be aware that if any string values ('active', 'inactive') were inserted,
            // they might be lost or converted to 0/1 during this rollback.
            $table->boolean('status')->default(false)->change();
        });
    }
};