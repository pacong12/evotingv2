<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new User([
            'name' => $row[1] ,
            'email' => $row[2],
            // 'email_verified_at' => $row[3],
            // 'password' => $row[4],
            // 'remember_token' => $row[5],
            // 'created_at' => $row[6],
            // 'updated_at' => $row[7],
            'token' => $row[8],
            // 'kelas_id' => $row[9],
            // 'kandidat_id' => $row[10],
        ]);
    }
}
