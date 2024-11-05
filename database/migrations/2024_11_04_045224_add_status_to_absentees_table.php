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
        $table->boolean('status')->default(false); // Default to false (Absent)
    });
}

public function down()
{
    Schema::table('absenteeisms', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
