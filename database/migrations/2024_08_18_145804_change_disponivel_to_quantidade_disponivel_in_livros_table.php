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
            $table->integer('quantidade_disponivel')->default(0)->after('ano_publicacao');
            $table->dropColumn('disponivel');
        });
    }

    public function down()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->boolean('disponivel')->default(true)->after('ano_publicacao');
            $table->dropColumn('quantidade_disponivel');
        });
    }

};
