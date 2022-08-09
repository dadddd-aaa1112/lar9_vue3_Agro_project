<?php

namespace App\Services\User;

use App\Models\ImportStatusExcel;

class Service
{
    public function successImport()
    {
        ImportStatusExcel::create([
            'type' => ImportStatusExcel::TYPE_USER,
            'status' => ImportStatusExcel::STATUS_IMPORT_SUCCESS,
            'user_id' => auth()->user()->id
        ]);
    }

    public function failedImport($errorRow, $errorMessages)
    {
        ImportStatusExcel::create([


            'type' => ImportStatusExcel::TYPE_USER,
            'status' => ImportStatusExcel::STATUS_IMPORT_FAILED,
            'commentarii' => [
                'row' => $errorRow,
                'messages' => ''
            ],
            'user_id' => auth()->user()->id
        ]);
    }
}
