<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'document'     => $row[0],
            'first_name'    => $row[1], 
            'last_name' => $row[2],
            'email' => $row[3],
        ]);
    }
}
