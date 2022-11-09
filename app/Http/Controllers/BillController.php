<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\Client;
use Validator;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        return response()->json($bills);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'company_name' => 'required|string|max:255',
            'nit' => 'required|integer',
            'code' => 'required|string',
        ]);
        

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $client = Client::where('id', $request->client_id)->get()->first();


        if ($client) {
            $bill = Bill::create($request->all());

        }else {
            return response()->json('Por favor, verifique el campo del cliente');  
        }

        return response()->json(['Factura agregada', $bill]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);

        if (is_null($bill)) {
            return response()->json('Factura no encontrada', 404); 
        }

        return response()->json($bill);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $bill->update($request->all());

        return response()->json(['Factura actualizada', $bill]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();

        return response()->json(['Factura eliminada', $bill]);
    }
}
