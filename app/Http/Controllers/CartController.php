<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = [];
        $total = 0;

        if (Auth::check()) {
            $dbItems = Auth::user()->cartItems()->with('product')->get();
            foreach ($dbItems as $item) {
                $cartItems[$item->product_id] = [
                    "product_id" => $item->product_id,
                    "name" => $item->product->name,
                    "quantity" => $item->quantity,
                    "price" => $item->product->price,
                    "image" => $item->product->image_path
                ];
                $total += $item->product->price * $item->quantity;
            }
        } else {
            $cartItems = session()->get('cart', []);
            foreach ($cartItems as $id => $details) {
                $total += $details['price'] * $details['quantity'];
                $cartItems[$id]['product_id'] = $id;
            }
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        if (Auth::check()) {
            $cartItem = Auth::user()->cartItems()->where('product_id', $product->id)->first();
            if ($cartItem) {
                $cartItem->increment('quantity');
            } else {
                Auth::user()->cartItems()->create([
                    'product_id' => $product->id,
                    'quantity' => 1
                ]);
            }
        } else {
            $cart = session()->get('cart', []);
            if(isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
            } else {
                $cart[$product->id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image_path
                ];
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove($id)
    {
        if (Auth::check()) {
            Auth::user()->cartItems()->where('product_id', $id)->delete();
        } else {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Product removed successfully');
    }
}
