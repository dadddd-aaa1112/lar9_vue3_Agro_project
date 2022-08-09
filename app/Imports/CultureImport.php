<?php

namespace App\Imports;

use App\Models\Culture;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CultureImport implements ToCollection,
    WithHeadingRow,
    SkipsEmptyRows,
    WithValidation
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        try {
            foreach ($collection as $item) {
                if ($item->filter()->isNotEmpty()) {
                    Culture::create([
                        'title' => $item['nazvanie']
                    ]);
                }
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {

            $failures = $e->failures();
            $errorRow = array();
            $errorMessage = array();

            foreach ($failures as $failure) {
                array_push($errorRow, $failure->row());
                array_push($errorMessage, $failure->errors());
            }


        }

    }

    public function rules(): array
    {
        return [
            'nazvanie' => 'required|string'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nazvanie.required' => 'Необходимо заполнить поле :attribute',
            'nazvanie.string' => 'Должны быть строковые значения'
        ];
    }
}
