<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Drink;

class DrinkOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $orders = [
            'Jae' => ['Beer', 'Coffee'],
            'Serena' => ['Water', 'Coffee'],
            'Dan' => ['Red Wine', 'Coffee', 'Water'],
            'Nick' => ['Water', 'Beer', 'Coffee'],
            'Jean' => ['Water', 'Sprite'],
            'Helen' => ['Coke', 'Coffee']
        ];

        # Now loop through the above array, creating a new pivot for each order to drink
        foreach ($orders as $name => $drinks) {
            # First get the order
            $order = Order::where('name', 'like', $name)->first();

            # Now loop through each drink for this order, adding the pivot
            foreach ($drinks as $drinkName) {
                $drink = Drink::where('name', 'LIKE', $drinkName)->first();

                # Connect this drink to this order
                $order->drinks()->save($drink);
            }
        }
    }
}
