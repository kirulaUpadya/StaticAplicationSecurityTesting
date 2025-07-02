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
        Schema::table('table_contacts', function (Blueprint $table) {
            $table->dropColumn('ContactID'); // Drop existing column
        });

        Schema::table('table_contacts', function (Blueprint $table) {
            $table->id('ContactID'); // Recreate as auto-incremented primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_contacts', function (Blueprint $table) {
            $table->dropColumn('ContactID'); // Rollback by dropping the column
            $table->integer('ContactID'); // Recreate it without auto-increment
        });
    }
};
