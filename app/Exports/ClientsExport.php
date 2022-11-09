<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class ClientsExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            "Documento",
            "Nombre completo",
            "Cantidad de facturas"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $clients = Client::select('document', 
                DB::raw("CONCAT(clients.first_name, ' ', clients.last_name) AS nombre_completo"))
                ->withCount('bills')
                ->get();

        return $clients;
        
    }

}
