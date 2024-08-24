<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEditoraIdToLivrosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->unsignedBigInteger('editora_id')->after('isbn');

            // Se você já tiver uma tabela de editoras, adicione a chave estrangeira:
            $table->foreign('editora_id')->references('id')->on('editoras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropForeign(['editora_id']);
            $table->dropColumn('editora_id');
        });
    }
}
