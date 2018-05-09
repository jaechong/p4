<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plate;
use App\Drink;
use App\Order;

class OrderController extends Controller
{
    /*
     * GET /orders
     */
    public function index()
    {
        $orders = Order::orderBy('id')->get();

        # Query the database to get the last 3 Orders added
        # $newOrders = Order::latest()->limit(3)->get();

        # [Better] Query the existing Collection to get the last 3 Orders added
        $newOrders = $orders->sortByDesc('created_at')->take(3);

        return view('orders.index')->with([
            'orders' => $orders,
            'newOrders' => $newOrders,
        ]);
    }

    /*
     * GET /orders/{id}
     */
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect('/orders')->with(
                ['alert' => 'Order ' . $id . ' not found.']
            );
        }

        return view('orders.show')->with([
            'order' => $order
        ]);
    }

    /**
     * Show the form to create a new order
     * GET /orders/create
     */
    public function create(Request $request)
    {
        return view('orders.create')->with([
            'platesForDropdown' => Plate::getForDropdown(),
            'drinksForCheckboxes' => Drink::getForCheckboxes(),
            'order' => new Order(),
            'drinks' => [],
        ]);
    }

    /**
     * Process the form to create a new order
     * POST /orders
     */
    public function store(Request $request)
    {
        # Custom validation messages
        $messages = [
            'plate_id.required' => 'The plate field is required.',
        ];

        $this->validate($request, [
            'name' => 'required',
            'plate_id' => 'required'
        ], $messages);

        # Save the order to the database
        $order = new Order();
        $order->name = $request->name;
        $order->plate_id = $request->plate_id;
        $order->save();

        $order->drinks()->sync($request->input('drinks'));

        # Send the user back to the page to add a order; include the name as part of the redirect
        # so we can display a confirmation message on that page
        return redirect('/orders/create')->with([
            'alert' => 'Order for ' . $order->name . ' was added.'
        ]);
    }

    /**
     * Show the form to edit an existing order
     * GET /orders/{id}/edit
     */
    public function edit($id)
    {
        # Get this order and eager load its drinks
        $order = Order::with('drinks')->find($id);

        # Handle the case where we can't find the given order
        if (!$order) {
            return redirect('/orders')->with(
                ['alert' => 'order ' . $id . ' not found.']
            );
        }

        # Show the order edit form
        return view('orders.edit')->with([
            'platesForDropdown' => Plate::getForDropdown(),
            'drinksForCheckboxes' => drink::getForCheckboxes(),
            'drinks' => $order->drinks()->pluck('drinks.id')->toArray(),
            'order' => $order
        ]);
    }

    /**
     * Process the form to edit an existing order
     * PUT /orders/{id}
     */
    public function update(Request $request, $id)
    {
        # Custom validation messages
        $messages = [
            'plate_id.required' => 'The plate field is required.',
        ];

        $this->validate($request, [
            'name' => 'required',
            'plate_id' => 'required'
        ], $messages);

        # Fetch the order we want to update
        $order = Order::find($id);

        # Update data
        $name = $order->name = $request->name;
        $order->plate_id = $request->plate_id;

        $order->drinks()->sync($request->input('drinks'));

        # Save edits
        $order->save();

        # Send the user back to the edit page in case they want to make more edits
        return redirect('/orders/' . $id . '/edit')->with([
            'alert' => 'The order for ' . $name . ' has been updated.'
        ]);
    }

    /*
    * Asks user to confirm they actually want to delete the order
    * GET /orders/{id}/delete
    */
    public function delete($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect('/orders')->with('alert', 'order not found');
        }

        return view('orders.delete')->with([
            'order' => $order,
        ]);
    }

    /*
    * Actually deletes the order
    * DELETE /orders/{id}/delete
    */
    public function destroy($id)
    {
        $order = Order::find($id);

        # Before we delete the order we have to delete any drink associations
        $order->drinks()->detach();

        $order->delete();

        return redirect('/orders')->with([
            'alert' => '“' . $order->name . '” was removed.'
        ]);
    }

}
