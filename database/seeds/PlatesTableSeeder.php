<?php

use Illuminate\Database\Seeder;
use App\Plate;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $plates = [
            ['Fish and salad', 480, 12.95, 'https://s3-media3.fl.yelpcdn.com/bphoto/64vvTC-Hl_48VXhCWcsADg/o.jpg'],
            ['Chicken fingers and mash with gravy', 370, 12.95, 'https://s3-media2.fl.yelpcdn.com/bphoto/qrY2E1QVepiUF_adQqoeew/o.jpg'],
            ['Toasted club and sweet potato fries', 950, 11.95, 'https://s3-media4.fl.yelpcdn.com/bphoto/8Hsq26-ly3S_Vhylj613kw/o.jpg'],
            ['Bacon and French toast', 400, 9.95, 'https://s3-media1.fl.yelpcdn.com/bphoto/_joRLVkIRxVmuHpRh_gJJg/o.jpg'],
            ['Sausage and pancakes', 380, 8.95, 'https://s3-media4.fl.yelpcdn.com/bphoto/2TtF57m4XfG787I-8TiicA/o.jpg'],
            ['Eggs, sausage and toast', 590, 8.95, 'https://s3-media4.fl.yelpcdn.com/bphoto/q4gmK76guvglTbpa_GMvcw/o.jpg']
        ];

        $count = count($plates);

        foreach ($plates as $key => $plateData) {
            $plate = new Plate();

            $plate->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $plate->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $plate->name = $plateData[0];
            $plate->calory = $plateData[1];
            $plate->price = $plateData[2];
            $plate->image_url = $plateData[3];

            $plate->save();
            $count--;
        }
    }
}
