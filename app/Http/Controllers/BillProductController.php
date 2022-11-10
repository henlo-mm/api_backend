<?php

namespace App\Http\Controllers;
use App\Models\BillProduct;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Http\Request;

class BillProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills_prod = BillProduct::all();

        return response()->json($bills_prod);
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
        $product = Product::where('id', $request->product_id)->get()->first();
        $bill = Bill::where('id', $request->bill_id)->get()->first();

        if (is_null($product) || is_null($bill)) {
            return response()->json('Factura o producto no encontrado', 404); 
        }else {
            $bill_prod = BillProduct::create($request->all());

            return response()->json(['La factura del producto ha sido agregada', $bill_prod]);
            
        }
            
        } catch (\Throwable $th) {
          
            DB::rollBack();
            return response()->json(['Ha ocurrido un error', $th]);
               
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill_prod = BillProduct::find($id);

        if (is_null($bill_prod)) {
            return response()->json('Factura de producto no encontrada', 404); 
        }

        return response()->json($bill_prod);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        BillProduct::where('id', $id)->update($request->all());

        return response()->json('Factura actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $bill_prod = BillProduct::where('id', $id)->delete();

        return response()->json(['Factura eliminada', $bill_prod]);
    }
}
