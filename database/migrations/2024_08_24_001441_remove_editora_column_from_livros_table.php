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
        Schema::table('livros', function (Blueprint $table) {
            $table->dropColumn('editora');
        });
    }

    public function down()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->string('editora')->nullable();
        });
    }

};
