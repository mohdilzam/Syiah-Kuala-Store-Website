<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement {

    // add item to cart
    static public function addItemToCart($product_id){
        $cart_items = self::getCartItemsFromCookie();

        $existing_item_key = null;

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                $existing_item_key = $key;
                break;
            }
        }

        if ($existing_item_key !== null){
            $cart_items[$existing_item_key]['quantity']++;
            $cart_items[$existing_item_key]['jumlah_total'] = $cart_items[$existing_item_key]['quantity'] *
                $cart_items[$existing_item_key]['jumlah_unit'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'gambar']);
            if($product){
                $cart_items[] = [
                    'product_id' => $product_id,
                    'name' => $product->name,
                    'gambar' => $product->gambar,
                    'quantity' => 1,
                    'jumlah_unit' => $product->price,
                    'jumlah_total' => $product->price
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // add item to cart with quantity
    static public function addItemToCartWithQty($product_id, $qty = 1){
        $cart_items = self::getCartItemsFromCookie();

        $existing_item_key = null;

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                $existing_item_key = $key;
                break;
            }
        }

        if ($existing_item_key !== null){
            $cart_items[$existing_item_key]['quantity'] = $qty;
            $cart_items[$existing_item_key]['jumlah_total'] = $cart_items[$existing_item_key]['quantity'] *
                $cart_items[$existing_item_key]['jumlah_unit'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'gambar']);
            if($product){
                $cart_items[] = [
                    'product_id' => $product_id,
                    'name' => $product->name,
                    'gambar' => $product->gambar,
                    'quantity' => $qty,
                    'jumlah_unit' => $product->price,
                    'jumlah_total' => $product->price
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // remove item from cart
    static public function removeCartItem($product_id){
        $cart_items = self::getCartItemsFromCookie();

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                unset($cart_items[$key]);
            }
        }

        self::addCartItemsToCookie(array_values($cart_items)); // Re-index the array
        return $cart_items;
    }

    // add cart item to cookie
    static public function addCartItemsToCookie($cart_items){
        Cookie::queue('cart_items', json_encode($cart_items), 60*24*30);
    }

    // clear cart item
    static public function clearCartItems(){
        Cookie::queue(Cookie::forget('cart_items'));
    }

    // get all cart item
    static public function getCartItemsFromCookie(){
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        if (!$cart_items){
            $cart_items = [];
        }
        return $cart_items;
    }

    // increment item quantity
    static public function incrementQuantityToCartItem($product_id){
        $cart_items = self::getCartItemsFromCookie();

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['jumlah_total'] = $cart_items[$key]['quantity'] * $cart_items[$key]['jumlah_unit'];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // decrement item quantity
    static public function decrementQuantityToCartItem($product_id){
        $cart_items = self::getCartItemsFromCookie();

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                if($cart_items[$key]['quantity'] > 1){
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['jumlah_total'] = $cart_items[$key]['quantity'] * $cart_items[$key]['jumlah_unit'];
                }
            }
        }
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // calculate total
    static public function calculateGrandTotal($items){
        return array_sum(array_column($items, 'jumlah_total'));
    }
}
