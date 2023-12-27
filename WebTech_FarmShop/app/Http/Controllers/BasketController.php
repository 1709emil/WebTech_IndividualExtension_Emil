<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;

class BasketController extends Controller
{


    public function finalizePurchase(Request $request)
    {
        // Data from request
        $data = $request->all();

        $orderItems = [];

        foreach ($data as $productName => $quantity) {

            $product = Product::where('name', $productName)->first();

            if ($product) {
                // Find or create stock for the product
                $stock = Stock::firstOrNew(['id' => $product->id]);

                // Check if stock is large enough
                if ($stock->quantity >= $quantity) {
                    $stock->quantity -= $quantity;
                    $stock->save();
                    // Update the stock quantity if quantity is high enough


                    // Creating of order
                    $orderItems[] = [
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                    ];


                    session()->flash('database_updated', 'Reservation completed successfully!');
                    // return redirect()->back();
                } else {

                    session()->flash('insufficient_stock', 'Sorry, insufficient stock');
                    return redirect()->back();
                }
            }
        }

        if (!empty($orderItems)) {
            $userID = Auth::user()->id;

            $order = Order::create([
                'date' => now(),
                'user_id' => $userID,
            ]);

            // Makes final order
            $order->product()->attach($orderItems);


        }


        // Redirect homeController
        $url = route('basket');
        return redirect($url);



        /*
         *$data = $request->all();

        foreach ($data as $productName => $quantity) {

            $product = Product::where('name', $productName)->first();

            if ($product) {
                // Find or create stock for the product
                $stock = Stock::firstOrNew(['id' => $product->id]);

                // Check if
                if ($stock->quantity >= $quantity) {
                    $stock->quantity -= $quantity;
                    $stock->save();
                    // Update the stock quantity if quantity is high enough

                    session()->flash('database_updated', 'Reservation completed successfully!');
                    // return redirect()->back();
                } else {

                    session()->flash('insufficient_stock', 'Sorry, insufficient stock');
                    return redirect()->back();
                }
            }
        }
         */

        /*

        $User = new User();
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->password = Hash::make($request->input('password'));
        $User->phoneNumber = $request->input('phoneNumber');
        $User->save();

        */
    }




}
