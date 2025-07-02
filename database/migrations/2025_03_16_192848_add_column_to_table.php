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
            if (!Schema::hasColumn('table_contacts', 'phone_number')) {
                $table->string('phone_number')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_contacts', function (Blueprint $table) {
            if (Schema::hasColumn('table_contacts', 'phone_number')) {
                $table->dropColumn('phone_number');
            }
        });
    }
};
