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
        Schema::table('experiences', function (Blueprint $table) {
            $table->enum('employment_type', [
                'full_time',
                'part_time',
                'contract',
                'internship',
                'freelance'
            ])->default('full_time')->after('role');

            $table->string('location')->nullable()->after('organization');

            $table->json('highlights')->nullable()->after('description'); 
            // key achievements (bullet points)

            $table->integer('order')->default(0)->after('is_current');

            $table->boolean('is_visible')->default(true)->after('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            //
        });
    }
};
