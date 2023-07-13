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
        Schema::create('restaurant_type', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')
                    ->references('id')
                    ->on('restaurants')
                    ->cascadeOnDelete();
                    //all'eliminazione  di un ristorante viene eliminata la relazione col tipo

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    ->onDelete('set null');
                    //all'eliminazione di un tipo per non dare errore  nel  ristorante sarà settato nullo

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_type');
    }
};
