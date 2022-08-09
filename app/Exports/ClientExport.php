<?php

namespace App\Exports;

use App\Models\Client;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Invoice;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;


class ClientExport implements
    //FromCollection,
    Responsable,
    FromView
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Clients.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

//    public function collection()
//    {
//        return client::all();
//    }

    public function view(): View
    {
        return view('exports.client.invoices', [
            'clients' => Client::all()
        ]);
    }
}
