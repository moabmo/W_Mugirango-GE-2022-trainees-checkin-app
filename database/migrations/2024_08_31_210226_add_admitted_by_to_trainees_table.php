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
        Schema::table('trainees', function (Blueprint $table) {
            // Add the admitted_by column
            $table->unsignedBigInteger('admitted_by')->nullable();

            // If you want to add a foreign key constraint (assuming you have a users table)
            $table->foreign('admitted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainees', function (Blueprint $table) {
            // Drop the foreign key constraint (if added)
            $table->dropForeign(['admitted_by']);
            
            // Drop the admitted_by column
            $table->dropColumn('admitted_by');
        });
    }
};
