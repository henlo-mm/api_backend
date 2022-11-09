<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Validator;
use Illuminate\Http\Request;
use App\Exports\ClientsExport;
use App\Imports\ClientImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return response()->json($clients);
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
            'document' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $client = Client::create($request->all());

        return response()->json(['Cliente agregado', $client]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        if (is_null($client)) {
            return response()->json('Cliente no encontrado', 404); 
        }
        return response()->json($client);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

        $client->update($request->all());

        return response()->json(['Cliente actualizado', $client]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json(['Cliente eliminado', $client]);
    }

    public function export() 
    {
        return Excel::download(new ClientsExport, 'clients.csv');
     
    }

    public function import(Request $request) 
    {
        
        Excel::import(new ClientImport, $request->file);
        
        return response()->json('El archivo fue cargado correctamente');
    }
}
