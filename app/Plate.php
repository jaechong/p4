<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    /*
     * Define the one to many relationship with plates
     */
    public function orders()
    {
        # plate has many orders
        # Define a one-to-many relationship.
        return $this->hasMany('App\Order');
    }

    /**
     * Return an array of plates where key = plate id and value = plates name
     */
    public static function getForDropdown()
    {
        $plates = self::orderBy('name')->get();

        $platesForDropdown = [];
        foreach ($plates as $plate) {
            $platesForDropdown[$plate->id] = $plate->name;
        }

        return $platesForDropdown;
    }

}
