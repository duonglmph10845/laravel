<?php

namespace App\Http\Controllers\Check;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail; 

class CheckoutController extends Controller
{
    //
    public function form()
    {
        if (Auth::check()) {
            return view('check/checkout');
        } else {
            return redirect()->back();
        }
    }
    public function submit_form(Request $request)
    {
        $id_ckeck = auth()->user()->id;
        $cart = session()->get('cart');
        // dd($cart);
        if ($invoice = Invoice::create([
            'user_id' => $id_ckeck,
            'number' => $request->number,
            'address' => $request->address,
            'total_price' => $request->totol_price,
        ])) {
            $invoice_id = $invoice->id;
            foreach ($cart as $item) {
                $quantity = $item['quantity'];
                $price = $item['price'];
                InvoiceDetail::create([
                    'invoice_id' => $invoice_id,
                    'product_id' => $item['id_product'],
                    'unit_price' => $price,
                    'quantity' => $quantity,
                ]);
            }
            Mail::to($request->email)
                ->send(new SendMail($id_ckeck, $request->name, $request->address, $request->phone, $request->email, $request->total_price));
            session()->forget('cart');
            return redirect()->back()->with('success', 'Đặt hàng thành công');;
        }
    }
}
