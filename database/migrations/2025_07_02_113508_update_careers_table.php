<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            if (!Schema::hasColumn('careers', 'job_title')) {
                $table->string('job_title')->nullable();
            }
            if (!Schema::hasColumn('careers', 'company')) {
                $table->string('company')->nullable();
            }
            if (!Schema::hasColumn('careers', 'duration')) {
                $table->string('duration')->nullable();
            }
            if (!Schema::hasColumn('careers', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
