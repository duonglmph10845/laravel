<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    //
    public function index(){
        $ListInvoice = DB::table('invoices')->select('invoices.id','invoices.user_id','invoices.number','invoices.address','invoices.total_price', 'invoices.status', 'invoices.created_at', 'users.name')->join('users', 'invoices.user_id', '=', 'users.id')->paginate(10);
        return view('admin.invoices.index', [
            'data' => $ListInvoice,
        ]);
    }
    
    public function edit(Invoice $invoice){
        return view('admin.invoices.edit', [
            'data' => $invoice,
        ]);
    }
    public function update(Invoice $invoice){
        $data = request()->except('_token');
        $invoice->update($data);

        return redirect()->route('admin.invoices.index');
    }
    public function delete(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('admin.invoices.index');
    }
    public function ct_invoice($id){
        $invoi_detail = DB::table('invoice_details')->select('invoice_details.id', 'invoice_details.unit_price', 'invoice_details.quantity', 'invoices.address', 'invoices.number', 'invoices.status', 'products.image')->join('invoices', 'invoice_details.invoice_id', '=', 'invoices.id')->join('products', 'invoice_details.product_id', '=', 'products.id')->where('invoices.user_id', $id)->paginate(10);
        // dd($invoi_detail);
        return view('admin.invoices.ct_invoice', [
            'data' => $invoi_detail,
        ]);
    }
}
