<?php

namespace App\Livewire;

use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Helpers\CartManagement;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Checkout')]
class CheckoutPage extends Component
{
    public $nama;
    public $no_hp;
    public $alamat;
    public $kota;
    public $kode_pos;
    public $metode_pembayaran;

    public function mount(){
        $cart_items = CartManagement::getCartItemsFromCookie();
        if(count($cart_items) == 0){
            return redirect('/products');
        }
    }

    public function placeOrder(){

        $this->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        $cart_items = CartManagement::getCartItemsFromCookie();

        $line_items = [];

        foreach($cart_items as $item){
            $line_item[] = [
                'price_data' => [
                    'currency' => 'idr',
                    'jumlah_unit' => $item['jumlah_unit'] * 100,
                    'product_data' => [
                        'name' => $item['name'],
                    ]
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_bayar = CartManagement::calculateGrandTotal($cart_items);
        $order->metode_pembayaran = $this->metode_pembayaran;

        // Set the payment status based on the payment method
        if (in_array($this->metode_pembayaran, ['bca', 'bsi', 'qris'])) {
            $order->status_pembayaran = 'paid';
        } else {
            $order->status_pembayaran = 'pending';
        }

        $order->status = 'new';
        $order->shipping_method = 'none';

        $address = new Address();
        $address->nama = $this->nama;
        $address->no_hp = $this->no_hp;
        $address->alamat = $this->alamat;
        $address->kota = $this->kota;
        $address->kode_pos = $this->kode_pos;

        $redirect_url = route('success');

        $order->save();
        $address->order_id = $order->id;
        $address->save();
        $order->items()->createMany($cart_items);
        CartManagement::clearCartItems();
        Mail::to(request()->user())->send(new OrderPlaced($order));
        return redirect($redirect_url);
    }

    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $total_bayar = CartManagement::calculateGrandTotal($cart_items);
        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'total_bayar' => $total_bayar
        ]);
    }
}
