<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {


        foreach ($collection as $item) {
            if ($item->filter()->isNotEmpty()) {
                $date = intval($item['data_dogovora']);
                Client::create([
                    'title' => $item['naimenovanie'],
                    'date_order' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y/m/d'),
                    'cost' => $item['stoimost_postavki'],
                    'region' => $item['region']
                ]);
            }
        }
    }
}
