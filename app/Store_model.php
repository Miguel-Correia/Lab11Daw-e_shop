<?php
namespace App;
use Illuminate\Support\Facades\DB;
class Store_model{

    public static function get_products($id){
        if($id != null)
            $products = DB::select("SELECT * FROM products WHERE cat_id = '" .$id. "' ORDER BY id");
        else
            $products = DB::select("SELECT * FROM products ORDER BY id");
        
            return $products;
    }
    //gets single product for cart
    public static function get_product($id){

        $product = DB::select("SELECT * FROM products WHERE id = '" .$id."'");
        return $product[0];
    }
    public static function get_categories(){

        $categories = DB::select("SELECT * FROM categories ORDER BY id");
        return $categories;
    }
    public static function register_user($username, $email, $password){
        $query = "INSERT INTO customers (name, email, created_at, updated_at, password_digest) VALUES ('" . $username . "','" . $email . "', NOW(), NOW(),'" . substr(md5($password), 0, 32) . "')";
        DB::insert($query);
        return true;
    }

    public static function validate_user($email, $password){
        $query = "SELECT * FROM customers WHERE email ='" . $email . "' AND password_digest ='" . substr(md5($password),0,32) . "'";
        $result = DB::select($query);
        
        if (!$result) 
            return false;
        else 
             return $result[0];
    }

    public static function create_order($customer_id, $total) {
        /*$query = "INSERT INTO orders (customer_id, created_at, total) VALUES ('". $customer_id. "', NOW(), '" . $total ."')";
        $result = DB::insert($query);
        return $result[0]->id;*/


        $id = DB::table('orders')->insertGetId(
            ['customer_id' => $customer_id, 'created_at' => date("Y-m-d H:i:s"), 'total' => $total]
        );

        return $id;
    }

    public static function insert_order_item($order_id, $product_id, $qty){
        $query = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('" . $order_id . "','" . $product_id . "','" . $qty . "')";
        DB::insert($query);
        return true;
    }

    public static function get_orders($customer_id){
        $query = "SELECT * FROM orders WHERE customer_id = '" . $customer_id . "' ORDER BY created_at DESC";
        $orders = DB::select($query);
        return $orders;
    }

    public static function get_order_items($order_id){
        
        $query = "SELECT * FROM order_items WHERE order_id = '" . $order_id . "'";
        $items = DB::select($query);
        
        $num = 1;
        foreach($items as $item) {
            $details = DB::select("SELECT * FROM products WHERE id = '" . $item->product_id . "'");
            $orderDetail = ['id' => $num, 'name' => $details[0]->name, 'price' => $details[0]->price, 'qty'=> $item->quantity];
            $result[$num] = $orderDetail;
            $num++;
        }

        return $result;
    }
}
?>