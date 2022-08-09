<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToCollection,
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
                    User::create([
                        'name' => $item['imia'],
                        'email' => $item['login'],
                        'password' => $item['parol'],
                        'role' => $item['rol'],
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
            'imia' => 'required|string',
            'login' => 'required|email',
            'parol' => 'required',

        ];
    }

    public function customValidationMessages()
    {
        return [
            'imia.required' => 'Необходимо заполнить :attribute',
            'login.required' => 'Необходимо заполнить :attribute',
            'parol.required' => 'Необходимо заполнить :attribute',
        ];
    }
}
