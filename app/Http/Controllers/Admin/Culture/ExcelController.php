<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\ExcelRequest;
use App\Jobs\ImportExcelCultureJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function __invoke(ExcelRequest $excelRequest)
    {
        $data = $excelRequest->validated();
        $file = $data['excel_culture'];
        $filePath = Storage::disk('public')->put('/files', $file);
        ImportExcelCultureJob::dispatch($filePath);

        return redirect()->route('admin.culture.index');


    }
}
