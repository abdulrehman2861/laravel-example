<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface
{
    
    /**
    * store
    *
    * @param  mixed $data
    */
    public function addProducttoCart($id, $qty = 1, $fitting)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->part_name,
                "quantity" => $qty,
                "unit_price" => $product->price,
                "row_total" => $product->price * $qty,
                "image" => $product->images->first()->img_url ?? null,
                "product_fitting_id" => $fitting,
            ];
        }
        session()->put('cart', $cart);
        
        $this->calculateSubTotal();
        $this->calculateTotal();
    }

    public function updateCart($data)
    {
        $cart = session()->get('cart');
        foreach($data['id'] as $key => $value) {
            $id = $value;
            $cart[$id]['quantity'] = $data['quantity'][$key];
            $cart[$id]['row_total'] = $cart[$id]['unit_price'] * $data['quantity'][$key];
        }
        session()->put('cart', $cart);

        $this->calculateSubTotal();
        $this->calculateTotal();
    }
  
    public function deleteCartProduct($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        $this->calculateSubTotal();
        $this->calculateTotal();
    }

    public function calculateSubTotal()
    {
        $cart = session()->get('cart');
        $subtotal = 0;
        foreach($cart as $item) {
            $subtotal += floatval($item['unit_price']) * intval($item['quantity']);
        }
        session()->put('cartSubtotal', $subtotal);
    }

    public function calculateTotal()
    {
        $cart = session()->get('cart');
        $total = 0;
        foreach($cart as $item) {
            $total += $item['row_total'];
        }
        
        // add shipping in cartTotal session
        if(session()->get('shipping_rate')){
            $total += session()->get('shipping_rate');
        }
        
        session()->put('cartTotal', $total);
    }

}


