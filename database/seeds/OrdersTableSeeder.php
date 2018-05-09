<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Plate;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $orders = [
            ['Jae', 'Fish and salad'],
            ['Serena', 'Chicken fingers and mash with gravy'],
            ['Dan', 'Sausage and pancakes'],
            ['Nick', 'Bacon and French toast'],
            ['Jean', 'Fish and salad'],
            ['Helen', 'Toasted club and sweet potato fries']
        ];

        $count = count($orders);

        foreach ($orders as $key => $orderData) {
            # Find that author in the authors table
            $plate_id = Plate::where('name', '=', $orderData[1])->pluck('id')->first();

            $order = new order();

            $order->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $order->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $order->name = $orderData[0];
            $order->plate_id = $plate_id;
            $order->save();
            $count--;
        }
    }
}
