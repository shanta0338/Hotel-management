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
        Schema::table('users', function (Blueprint $table) {
            // $table->string('phone')->nullable()->after('email'); // Removed to prevent duplicate column error
            // $table->string('usertype')->default('user')->after('email'); // Removed to prevent duplicate column error
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn(['phone', 'usertype']);
            // $table->dropColumn(['usertype']);
        });
    }
};
