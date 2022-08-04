<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTypeTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_tickets', function (Blueprint $table) {
            $table->text('beneficios')->nullable()->after('cuantos_ticket');
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
            $table->dropColumn('beneficios');
        });
    }
}
