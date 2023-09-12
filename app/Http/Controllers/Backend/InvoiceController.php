<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Invoice;
use App\Models\User;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::orderByDesc('id')->get();

        return view('admin.invoices.index', [
            'invoices' => $invoices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderByDesc('id')->get();

        return view('admin.invoices.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'cc' =>'required|min:3|numeric',
            'tc' => 'required|min:13|numeric',
            'cvc' => 'required|min:3|numeric',
            'fecha_vencimiento' => 'required'
        ]);

        $invoice = new Invoice();
        $invoice->user_id = $request->user_id;
        $invoice->cc = $request->cc;
        $invoice->tc = $request->tc;
        $invoice->cvc = $request->cvc;
        $invoice->fecha_vencimiento = $request->fecha_vencimiento;
        $invoice->save();

        return Redirect::action([InvoiceController::class, 'index'])->with([
            'success' => 'La factura ha sido creada',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $users = User::orderByDesc('id')->get();

        return view('admin.invoices.create',[
            'users' => $users, 'invoice' => $invoice
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'user_id' => 'required',
            'cc' =>'required|min:3|numeric',
            'tc' => 'required|min:13|numeric',
            'cvc' => 'required|min:3|numeric',
            'fecha_vencimiento' => 'required'
        ]);

        $invoice->user_id = $request->user_id;
        $invoice->cc = $request->cc;
        $invoice->tc = $request->tc;
        $invoice->cvc = $request->cvc;
        $invoice->fecha_vencimiento = $request->fecha_vencimiento;
        $invoice->save();

        return Redirect::action([InvoiceController::class, 'index'])->with([
            'success' => 'La factura ha sido editada',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return Redirect::action([InvoiceController::class, 'index'])->with([
            'success' => 'La factura ha sido eliminada',
        ]);
    }
}
