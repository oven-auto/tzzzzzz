<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //[номер, статус, дата, ссылка на покупателя, резерв товаров с фиксацией цен]
        Schema::create('orders', function (Blueprint $table) {
            $table->id();//ид и будет номером
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();//дата создания в криэейтед_ат
            $table->enum('status', ['work','abort', 'confirm'])->default('work');//поидее наверное лучше вынести таблицу статусов отдельно, 
            // а здесь указывать ссылку на статус, сделаю enum хоть и не люблю его. Просто что бы было проще
            
            //резерв товаров с фиксацией цен - тут я сделаю отдельную таблицу. Возможно вы имели ввиду столбец типа json
            // в которм будет хранится объект json вида [{product_id: 12, price: 499},{product_id: 10, price: 10}]
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
