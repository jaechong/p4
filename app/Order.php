<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plate()
    {
        # Order belongs to Plate
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Plate');
    }

    public function drinks()
    {
        # With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Drink')->withTimestamps();
    }

    /*
    * Dump the essential details of orders to the page
    * Used when practicing queries and you want to quickly see the orders in the database
    * Can accept a Collection of orders, or if none is provided, will default to all orders
    */
    public static function dump($orders = null)
    {
        # Empty array that will hold all our order data
        $data = [];

        # Determine if we should use $orders as was passed to this method
        # or query for all orders
        if (is_null($orders)) {
            # Query for all the orders
            $orders = self::all();
        }

        # Load the data array with the order info we want
        foreach ($orders as $order) {
            $data[] = $order->name . ' orders ' . $order->plate;
        }
        dump($data);
    }

}
