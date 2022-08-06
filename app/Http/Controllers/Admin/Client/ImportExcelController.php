<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\ExcelRequest;
use App\Jobs\ClientExcelImportJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportExcelController extends Controller
{
    public function __invoke(ExcelRequest $excelRequest) {
        $data = $excelRequest->validated();

        $fileExcel = $data['excel_client'];
        $fileExcelPath = Storage::disk('public')->put('/files', $fileExcel);


        ClientExcelImportJob::dispatch($fileExcelPath);

        return redirect()->route('admin.client.index')->with('status', 'Данные загружаются');

    }
}
