<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_service');
            $table->unsignedBigInteger('id_action');
            $table->double('amount', 8, 2);
            $table->unsignedBigInteger('id_ticket');
            $table->timestamps();
            $table->softDeletes('deleted_at');

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_service')->references('id')->on('services');
            $table->foreign('id_action')->references('id')->on('actions');
            $table->foreign('id_ticket')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
