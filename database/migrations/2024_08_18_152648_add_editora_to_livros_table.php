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
            // Verifique se a coluna já existe antes de adicionar
            if (!Schema::hasColumn('livros', 'editora')) {
                $table->string('editora')->after('isbn');
            }
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            //
        });
    }
};
