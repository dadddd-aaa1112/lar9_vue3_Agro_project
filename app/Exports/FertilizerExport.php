<?php

namespace App\Exports;

use App\Models\Fertilizer;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class FertilizerExport implements FromView, Responsable
{
    use Exportable;

    /**
     * fileName
     */
    private $fileName = 'Fertilizer.xlsx';

    private $writerType = Excel::XLSX;

    private $headers = [
      'Content-Type' => 'text/csv'
    ];


    public function view(): View
    {
        return view('exports.fertilizer.index', [
                'fertilizers' => Fertilizer::all()
            ]
        );
    }
}
