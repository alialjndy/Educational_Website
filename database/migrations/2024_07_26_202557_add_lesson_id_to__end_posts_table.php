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
        Schema::table('end_posts', function (Blueprint $table) {
             $table->unsignedBigInteger('lesson_id')->nullable();
              $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('end_posts', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']); // حذف مفتاح الأجنبي
            $table->dropColumn('lesson_id'); // حذف العمود
        });
    }
};
