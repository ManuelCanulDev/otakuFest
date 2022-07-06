<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTypeTpTypeTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_tickets', function (Blueprint $table) {
            $table->enum('valido',['U','D','I'])->after('nombre_ticket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_tickets', function (Blueprint $table) {
            $table->dropColumn('valido');
        });
    }
}
