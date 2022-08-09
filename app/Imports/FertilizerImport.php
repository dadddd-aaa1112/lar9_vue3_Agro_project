<?php

namespace App\Imports;

use App\Models\Fertilizer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FertilizerImport implements ToCollection,
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
                    Fertilizer::create([
                        'title' => $item['naimenovanie'],
                        'norm_azot' => $item['norma_azot'],
                        'norm_fosfor' => $item['norma_fosfor'],
                        'norm_kalii' => $item['norma_kalii'],
                        'culture_id' => $item['kultura_id'],
                        'raion' => $item['raion'],
                        'cost' => $item['stoimost'],
                        'description' => $item['opisanie'],
                        'target' => $item['naznacenie']
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

    public function rules(): array {
        return [

        ];
    }

    public function customValidationMessages() {
        return [

        ];
    }
}
