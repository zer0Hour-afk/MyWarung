<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $path = database_path('sql/db_kelontong.sql');
        DB::unprepared(file_get_contents($path));
    }   

    public function down()
    {
    // Jika perlu, tambahkan DROP TABLE di sini
    }
};
