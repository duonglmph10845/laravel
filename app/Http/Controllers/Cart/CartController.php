<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function view(){
        $ListCategories = Category::all();
        return view('cart', [
            'datat' => $ListCategories,
        ]);
    }
    public function addToCart($id){
        
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart');
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id_product' => $id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công');
    }
    public function update(Request $request)
    {
        $carts = session()->get('cart');
        $carts[$request->id]['quantity'] = $request->quantity;
        session()->put('cart', $carts);
        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');;
    }
    public function remove($id, Request $request)
    {
        $carts = session()->get('cart');
            unset($carts[$id]);
            session()->put('cart', $carts);
            return redirect()->back();
    }
}
