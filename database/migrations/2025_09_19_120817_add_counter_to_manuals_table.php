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
        Schema::table('manuals', function (Blueprint $table) {
            $table->integer('counter')->default(0)->after('downloadedServer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('manuals', function (Blueprint $table) {
            $table->dropcolumn('counter');
        });
    }
};
