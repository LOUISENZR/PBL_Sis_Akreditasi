<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('m_kriteria', function (Blueprint $table) {
            $table->unsignedBigInteger('id_level')->nullable()->after('id_user');
        });
    }

    public function down()
    {
        Schema::table('m_kriteria', function (Blueprint $table) {
            $table->dropColumn('id_level');
        });
    }
};