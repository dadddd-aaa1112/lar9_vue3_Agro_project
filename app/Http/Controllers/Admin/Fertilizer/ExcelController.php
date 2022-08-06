<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\ExcelRequest;
use App\Imports\FertilizerImport;
use App\Jobs\FertilizerJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function __invoke(ExcelRequest $excelRequest)
    {
        $data = $excelRequest->validated();

        $fileExcel = $data['excel_fertilizer'];
        $filePath = Storage::disk('public')->put('/files', $fileExcel);
        FertilizerJob::dispatch($filePath);

        return redirect()->route('admin.fertilizer.index')->with('status', 'Данные загружаются');
    }
}
