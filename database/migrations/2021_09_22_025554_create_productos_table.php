<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producto');
            $table->unsignedInteger('id_marca')->nullable()->index();
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('precio_costo')->nullable()->index();
            $table->unsignedInteger('precio_venta')->nullable()->index();
            $table->unsignedInteger('existencia')->nullable()->index();
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
        Schema::dropIfExists('productos');
    }
}
