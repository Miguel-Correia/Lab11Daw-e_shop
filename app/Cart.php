<?php
namespace App;

class Cart{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }

    public function add($product) {
        $sItem = ['qty' => 1, 'price' => $product->price, 'name' => $product->name, 'id' => $product->id];
        if($this->items) {
            if(array_key_exists($product->id, $this->items)) {
                $sItem = $this->items[$product->id];
                $sItem['qty']++;
                $sItem['price'] = $product->price * $sItem['qty'];
            } 
        }

        $this->items[$product->id] = $sItem;
        $this->totalQty++;
        $this->totalPrice += $product->price; 
    }

    public function incrementQty($id) {
        $changedItem = $this->items[$id];
        $price = $changedItem['price']/$changedItem['qty'];

        $changedItem['qty']++;
        $changedItem['price'] = $price * $changedItem['qty'];

        $this->items[$id] = $changedItem;
        $this->totalQty++;
        $this->totalPrice += $price;

    }

    public function decrementQty($id) {
        $changedItem = $this->items[$id];
        $price = $changedItem['price']/$changedItem['qty'];

        $changedItem['qty']--;
        $changedItem['price'] = $price * $changedItem['qty'];

        
        if($changedItem['qty'] == 0)
            unset($this->items[$id]);
        else
            $this->items[$id] = $changedItem;

        $this->totalQty--;
        $this->totalPrice -= $price;
 
    }
    
    public function removeItem($id) {
        $removedItem = $this->items[$id];
        
        unset($this->items[$id]);

        $this->totalQty -=  $removedItem['qty'];
        $this->totalPrice -=  $removedItem['price'];
    }

}
?>