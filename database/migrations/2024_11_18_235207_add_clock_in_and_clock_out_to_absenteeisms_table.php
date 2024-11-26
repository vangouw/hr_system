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
        Schema::table('absenteeisms', function (Blueprint $table) {
            $table->timestamp('clock_in')->nullable();
            $table->timestamp('clock_out')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('absenteeisms', function (Blueprint $table) {
            $table->dropColumn(['clock_in', 'clock_out']);
        });
    }
    
};
