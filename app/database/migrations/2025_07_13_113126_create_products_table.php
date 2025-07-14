<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // [наименование, описание, цена, кол-во на складе]
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');            //лучше бы наверное вынести в отдельную таблицу, делаю как в тз
            $table->integer('price')->unsigned();   //лучше бы наверное вынести в отдельную таблицу, делаю как в тз
            $table->integer('amount')->unsigned();  //лучше бы наверное вынести в отдельную таблицу, делаю как в тз
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
