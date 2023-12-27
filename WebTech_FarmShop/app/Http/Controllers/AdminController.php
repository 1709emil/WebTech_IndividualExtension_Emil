<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;

class AdminController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function getUser(){
        $users = DB::table('users')->select('id','name','email','phoneNumber')->get();
        //error_log($users);
        return view ('userData',['userData'=>$users]);
    }

    public function getAdminPage(){
        $orders = Order::with('product')->get();
        $users = DB::table('users')->select('id','name','email','phoneNumber')->get();
        $products = Product::with('pictures')->get();
        return view('admin', ['data'=>[$orders,$users,$products]]);
    }

    public function createProduct(Request $request)
    {
        $url = route('admin'); //this is prob wrong, but im too tired to figure it out rn

        //create new stock
        $stock = new Stock();
        //save it
        $stock->save();
        //get new stock id
        $stockID = $stock->id; //think this works

        $picture = new Picture();
        //spoofing fileName and fileExtension as i couldnt get the picture chooser to work
        $picture->fileName = "placeholder";
        $picture->fileExtension ="png";

        $picture->save();

        $pictureID = $picture->id;

        $product = new Product();
        $product->name = $request->input('name');
        $product->unit_price = $request->input('price');
        $product->picture_id = $pictureID;
        $product->stock_id = $stockID; //this should hopefully just assign new stock id to product, same with picture id
        $product->dateAdded = "1/1/2000"; //Either remove this element from database, or make it auto.
        $product->description = $request->input('description');
        $product->save();

        return redirect($url);

    }





    public function indexUser()
    {
        $item = User::all();

    }

#todo uh make
    public function deleteUser($id){
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route();
    }


    public function createOrders(Request $request)
    {
        $url = route('admin');

        //create new order
        $order = new Order();
        $order->date = $request->input('date');
        $order->quantityBought = $request->input('quantityBought');
        $order->totalPrice = $request->input('totalPrice');
        $order->user_id = $request->input('user_id'); //for future change to drop down menu or something to search for names so admin doesnt have to cross reference IDs

        //save new order
        $order->save();

        return redirect($url);
        //need to check if $url is right, prob not
    }

    public function deleteProductByName($name)
    {
        $item = Product::findOrFail($name);
        $item->delete();

        return redirect()->back()->with('message', 'Product deleted successfully.');
    }


    public function updateProduct(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->unit_price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();

//        $product->update($request);

        return redirect()->back()->with('message', 'Product updated');
    }


}
