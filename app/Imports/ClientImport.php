<?php

namespace App\Imports;

use App\Models\Client;

use App\Services\Client\Service;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ClientImport implements ToCollection,
    WithHeadingRow,
    SkipsEmptyRows,
    WithValidation

{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

   //     try {


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

//            ImportStatusExcel::create([
//                'type' => ImportStatusExcel::TYPE_CLIENT,
//                'status' => ImportStatusExcel::STATUS_IMPORT_SUCCESS,
//                'user_id' => auth()->user()->id
//            ]);




//        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
//            $failures = $e->failures();


//            $errorRow = array();
//            $errorMessage = array();
//
//            foreach ($failures as $failure) {
//                array_push($errorRow, $failure->row());
//                array_push($errorMessage, $failure->errors());
//            }
//
//
//            ImportStatusExcel::create([
//                'type' => ImportStatusExcel::TYPE_CLIENT,
//                'status' => ImportStatusExcel::STATUS_IMPORT_FAILED,
//                'commentarii' => [
//                    'row' => $errorRow,
//                    'errors' => ''
//                ],
//                'user_id' => auth()->user()->id
//            ]);
//
 //       }
    }

    public  function rules(): array
    {
        return [
            'naimenovanie' => 'required|string',
            'data_dogovora' => 'required',
            'stoimost_postavki' => 'required|numeric',
            'region' => 'required|string'
        ];
    }

    public function customValidationMessages()
    {

        return [
            'naimenovanie.required' => 'Отсутствует поле наименование',
            'data_dogovora.required' => 'Отсутствует поле дата договора',
            'stoimost_postavki.required' => 'Отсутствует поле стомость поставки',
            'region.required' => 'Добавьте дату в импортируемый файл'
        ];
    }
}
