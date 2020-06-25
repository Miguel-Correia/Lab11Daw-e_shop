<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store_model;
use App\Cart;
use Illuminate\Support\Facades\Storage;
use Session;


class Store extends Controller{

    public function index(Request $requests, $id = null){
        
        if($requests->session()->has('cart'))
            $oldCart = $requests->session()->get('cart');
        else
            $oldCart =null;

        $cart = new Cart($oldCart);
        $requests->session()->put('cart', $cart);


        $products = Store_model::get_products($id);
        $categories = Store_model::get_categories();
        return view('products_template', compact('products'), compact('categories'));
    }

    public function cartItemInsert(Request $requests, $id){
        $product = Store_model::get_product($id);
        if($product) {
            if($requests->session()->has('cart'))
                $oldCart = $requests->session()->get('cart');
            else
                $oldCart =null;

            $cart = new Cart($oldCart);
            $cart->add($product);

            $requests->session()->put('cart', $cart);
            return redirect()->back();
        }

    }

    public function cartEmpty(Request $requests){
        $cart = new Cart(null);

        $requests->session()->put('cart');
        return redirect()->route('store');
    }

    public function register(){
        $categories = Store_model::get_categories();
        return view('register_template', compact('categories'));
    }

    public function registerAction(){
        $this->validate(request(), [
            'name'=>'required',
            'email'=>'required|email|unique:customers',
            'pass'=>'required|min:5',
            'conf_pass'=>'required|same:pass',
        ]);

        $name = request('name');
        $email = request('email');
        $pass = request('pass');
        $conf_pass = request('conf_pass');
        
        Store_model::register_user($name, $email, $pass);
        $message = "Success: New user registered";
        return view('message_template', compact('message'));
    }

    public function login(){
        $categories = Store_model::get_categories();
        return view('login_template', compact('categories'));
    }


    public function loginAction(){
        $categories = Store_model::get_categories();

        $this->validate(request(), [
            'email'=>'required|email',
            'pass'=>'required',
        ]);
        
        $email = request('email');
        $pass = request('pass');

        $result = Store_model::validate_user($email, $pass);

        if($result == false) {
            $err_auth = "Login failed";
            return view('login_template', compact('err_auth'), compact('categories'));
 
        }else {
            session(['id' => $result->id]);
            session(['name' => $result->name]);
            session(['email' => $result->email]);
            $message = "Welcome back, ".$result->name."!";

            return view('message_template', compact('message'));
        }
    }

    public function logout(Request $requests){
        $message="See you back soon " .session('name'). "!";
        session(['id' => '']);
        session(['name' => '']);
        session(['email' => '']);

        $cart = new Cart(null);
        $requests->session()->put('cart');

        return view('message_template', compact('message'));
    }

    public function checkout(){
        $categories = Store_model::get_categories();
        return view('checkout_template', compact('categories'));
    }

    public function checkoutAction(Request $requests){
        $cart = $requests->session()->get('cart');
        $customer_id = $requests->session()->get('id');
        $total = $cart->totalPrice;

        $order_id = Store_model::create_order($customer_id, $total);

        foreach ($cart->items as $item) {
            $product_id = $item['id'];
            $qty = $item['qty'];

            Store_model::insert_order_item($order_id, $product_id, $qty);
        }

        $cart = new Cart(null);
        $requests->session()->put('cart');

        $message="".session('name').", your order as been placed!";
        return view('message_template', compact('message'));
    }

    public function qtyChange(Request $requests, $id, $type){
        $cart = $requests->session()->get('cart');
        if($type == 'minus')
            $cart->decrementQty($id);
        else if($type == 'plus')
            $cart->incrementQty($id);

        return redirect()->route('checkout');
    }

    public function remove(Request $requests, $id){
        $cart = $requests->session()->get('cart');
        $cart->removeItem($id);

        return redirect()->route('checkout');
    }

    public function orders(Request $requests){
        $customer_id = $requests->session()->get('id');

        $categories = Store_model::get_categories();
        $orders = Store_model::get_orders($customer_id);
        return view('orders_template', compact('categories'), compact('orders'));
    }

    public function orderDetails($order_id){
        $categories = Store_model::get_categories();
        $items = Store_model::get_order_items($order_id);
        return view('orderDetails_template', compact('items'), compact('categories'));
    }

}
?>