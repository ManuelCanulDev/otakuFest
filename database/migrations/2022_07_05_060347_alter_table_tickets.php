<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('nombres',100)->nullable()->change();
            $table->string('apellidos',100)->nullable()->change();
            $table->string('telefono',20)->nullable()->change();
            $table->string('correo',100)->nullable()->change();
            $table->string('token',100)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('nombres',100)->nullable(false)->change();
            $table->string('apellidos',100)->nullable(false)->change();
            $table->string('telefono',20)->nullable(false)->change();
            $table->string('correo',100)->nullable(false)->change();
            $table->string('token',100)->nullable(false)->change();
        });
    }
}
