<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Plate;
use App\Drink;;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function menu()
    {
        $plates = Plate::all();
        $drinks = Drink::all();

        return view('menu.index')->with([
            'plates' => $plates,
            'drinks' => $drinks,
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact')->with([
            'email' => config('app.supportEmail')
        ]);
    }
}
