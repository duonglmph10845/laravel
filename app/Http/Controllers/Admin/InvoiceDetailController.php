<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceDetailController extends Controller
{
    //
    public function index(){
        $ListInvoiDetail = InvoiceDetail::paginate(10);
        
        return view('admin.invoice_details.index', [
            'data' => $ListInvoiDetail,
        ]);
    }
    public function edit(InvoiceDetail $invoiceDetail){
        return view('admin.invoice_details.edit', [
            'data' => $invoiceDetail,
        ]);
    }
    public function store(InvoiceDetail $invoiceDetail){
        $data = request()->except('_token');
        $invoiceDetail->update($data);

        return redirect()->route('admin.invoice_details.index');
    }
    public function delete($id)
    {
        $invoice_details = InvoiceDetail::find($id);
        $invoice_details->delete();
        return redirect()->route('profile_invoice');
    }
    public function delete_invoice($id)
    {
        $invoice_details = InvoiceDetail::find($id);
        $invoice_details->delete();
        return redirect()->route('profile-invoice');
    }
}
