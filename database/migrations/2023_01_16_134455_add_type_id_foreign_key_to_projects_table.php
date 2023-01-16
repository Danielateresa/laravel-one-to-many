<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //aggiungo la colonna con la chiave esterna che collegherà il progetto alla tipologia
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //nel distruggere la colonna creata procedo al contrario del metodo up
            $table->dropForeign('projects_type_id_foreign'); //tabella_colonna_foreign
            $table->dropColumn('type_id');
        });
    }
};