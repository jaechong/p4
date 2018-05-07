<?php

use Illuminate\Database\Seeder;
use App\Drink;

class DrinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $drinks = [
            ['Coke', 200, 1.95],
            ['Sprite', 200, 1.95],
            ['Beer', 150, 5.95],
            ['Red Wine', 85, 5.95],
            ['White Wine', 82, 5.95],
            ['Coffee', 1, 1.95]
        ];

        $count = count($drinks);

        foreach ($drinks as $key => $drinkData) {
            $drink = new drink();

            $drink->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $drink->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $drink->name = $drinkData[0];
            $drink->calory = $drinkData[1];
            $drink->price = $drinkData[2];

            $drink->save();
            $count--;
        }
    }

}
