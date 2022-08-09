<?php

namespace App\Services\Client;

use App\Models\ImportStatusExcel;

class Service
{
    public function successImport($type, $status)
    {
        ImportStatusExcel::create([
            'type' => $type,
            'status' => $status,
            'user_id' => auth()->user()->id
        ]);
    }

    public function failedImport($type, $status, $errorRow, $errorMessage)
    {
        ImportStatusExcel::create([

            'type' => $type,
            'status' => $status,
            'commentarii' => [
                'row' => $errorRow,
                'errors' => ''
            ],
            'user_id' => auth()->user()->id
        ]);
    }

}
