<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('telefono',20);
            $table->string('correo',100);
            $table->boolean('asistio');
            $table->boolean('pagado');
            $table->string('token',100);
            $table->enum('status',['A','D']);
            $table->timestamps();
            $table->foreign('type_ticket_id')->references('id')->on('type_tickets');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
