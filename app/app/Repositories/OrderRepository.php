<?php 

namespace App\Repositories;

use App\Http\DTO\OrderDTO;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

Class OrderRepository
{
    private function setStatus($order, string $str)
    {
        if(in_array($str, Order::STATUSES))
            $order->status = $str;
    }



    //Списать балы
    private function deductScore($order)
    {
        $sum = $order->products->map(function($item){
            return $item->pivot->price * $item->pivot->count;
        })->sum();
        
        $order->client->score -= $sum;

        $order->client->save();
    }



    //Списать продукты
    private function deductProduct($order)
    {
        $order->products->each(function($item){
            $item->amount -= $item->pivot->count;

            $item->save();
        });
    }



    //Вернуть балы
    private function returnScore($order)
    {
        $order->products->each(function($item){
            $item->amount += $item->pivot->count;

            $item->save();
        });
    }



    //Вернуть продукты
    private function returnProduct($order)
    {
        $order->products->each(function($item){
            $item->amount += $item->pivot->count;

            $item->save();
        });
    }



    //сохранить продукты в заказе
    private function saveOrderProducts($order, OrderDTO $dto)
    {
        foreach($dto->products as $item)
        {
            $product = Product::find($item['product_id']);
            
            if($product->amount < $item['count'])
                throw new Exception('Товара на складе меньше, чем вы просите)))');

            $order->products()->attach(
                $item['product_id'], 
                [
                    'count' => $item['count'], 
                    'price' => $product->price,
                ]
            );
        }
    }



    public function getById(int $id)
    {
        return Order::findOrFail($id);
    }



    public function create(OrderDTO $dto)
    {
        $order = DB::transaction(function() use($dto){
            $order = Order::create([
                'client_id' => $dto->client_id,
            ]);

            $this->saveOrderProducts($order, $dto);

            $this->deductProduct($order);//поидее отдельный сервис, но засунул в этот же репозиторий, 
            //создавать отделюную модель для резерва кол-ва товаров думаю тут не обязательно. 
            //Проще сделать метод отмену зказа и в нем вызвать метод для возвращения товаров на склад

            $order = $order->fresh();

            return $order;
        }, 3);

        return $order;
    }



    public function approve(int $orderId)
    {
        $order = DB::transaction(function() use($orderId) {
            $order = $this->getById($orderId);
        
            $this->setStatus($order, 'confirm');

            $this->deductScore($order);

            $order->save();

            return $order;
        }, 3);
        
        return $order;
    }
}