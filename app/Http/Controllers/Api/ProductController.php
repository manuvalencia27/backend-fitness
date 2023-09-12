<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = new Cart;
        $cart->status = 'abierta';
        $cart->save();

        $orden = new CartItem;
        $orden->cart_id = $cart->id;
        $orden->product_id = $request->product_id;
        $orden->user_id = $request->user_id;
        $orden->quantity = $request->quantity;
        $orden->subtotal = $request->subtotal;
        $orden->total = $request->subtotal;
        $orden->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'orden de compra creada correctamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {   
        $product->load('category', 'tag', 'comments.user');
        return new JsonResponse($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $orden = CartItem::where('product_id', $request->product_id)->where('user_id', $request->user_id)->first();
        $orden->cart_id = $orden->cart_id;
        $orden->product_id = $request->product_id;
        $orden->user_id = $request->user_id;
        $orden->quantity = (int)$request->quantity;
        $orden->subtotal = $request->subtotal;
        $orden->total = $request->subtotal;
        $orden->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'orden de compra editada correctamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function finalizar(Request $request)
    {

        $orden = Cart::find(1);
        $orden->status = 'pagada';

        $invoice = new Invoice;
        $invoice->user_id = $request->user->id;
        $invoice->cc = $request->cc;
        $invoice->tc = $request->tc;
        $invoice->cvc = $request->cvc;
        $invoice->fecha_vencimiento = $request->fecha_vencimiento;
        $invoice->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'La factura fue registrada con exito'
        ]);
    }
}
