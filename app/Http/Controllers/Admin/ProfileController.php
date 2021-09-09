<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //
    public function view($id){
        $id_user = User::find($id);
        return view('profile', [
            'data' => $id_user,
        ]);
    }
    // public function profile_user($id){
    //     $id_user = User::find($id);
    //     return view('profile', [
    //         'data' => $id_user,
    //     ]);
    // }
    public function user_invoice($id){
        $profile = DB::table('invoice_details')->select('invoice_details.id', 'invoice_details.quantity', 'invoices.number', 'invoices.address', 'invoices.user_id', 'invoices.total_price', 'invoices.status', 'products.image', 'products.name as name_pr')->join('invoices', 'invoice_details.invoice_id', '=', 'invoices.id' )->join('products', 'invoice_details.product_id', '=', 'products.id')->where('user_id', $id)->paginate(10);
        
        return view('profile_invoice', compact('profile'));
    }
}
