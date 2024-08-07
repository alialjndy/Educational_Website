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
        // rename column user
        Schema::table('users', function (Blueprint $table) {
        $table->renameColumn('name', 'UserName');
        });

        // rename column email
        Schema::table('users', function (Blueprint $table) {
        $table->renameColumn('email', 'Email');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('UserName', 'user');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('Email', 'email');
        });
    }
};
