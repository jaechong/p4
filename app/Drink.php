<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    /*
     * Define the many to many relationship with orders
     */
    public function orders()
    {
        # With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Order')->withTimestamps();
    }

    /*
     * Generate an array of drinks where key = drink id and value = drink name
     */
    public static function getForCheckboxes()
    {
        $drinks = self::orderBy('name')->get();

        $drinksForCheckboxes = [];

        foreach ($drinks as $drink) {
            $drinksForCheckboxes[$drink->id] = $drink->name;
        }

        return $drinksForCheckboxes;
    }

}
