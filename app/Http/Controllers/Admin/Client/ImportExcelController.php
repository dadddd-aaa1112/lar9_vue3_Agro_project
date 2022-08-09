<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\ExcelRequest;
use App\Jobs\ClientExcelImportJob;
use App\Models\ImportStatusExcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportExcelController extends BaseController
{
    public function __invoke(ExcelRequest $excelRequest)
    {
        $data = $excelRequest->validated();

        $fileExcel = $data['excel_client'];
        $fileExcelPath = Storage::disk('public')->put('/files', $fileExcel);

        ClientExcelImportJob::dispatch($fileExcelPath);

    }
}
//        try {
//
//
//            ImportStatusExcel::create([
//                'type' => ImportStatusExcel::TYPE_CLIENT,
//                'status' => ImportStatusExcel::STATUS_IMPORT_SUCCESS,
//                'user_id' => auth()->user()->id
//            ]);
//
//        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
//            $failures = $e->failures();
//
//
//           $errorRow = array();
//           $errorMessage = array();
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
//
//        }
//        return back();
//    }
//
//}






//        try {
//            ClientExcelImportJob::dispatch($fileExcelPath);
//            $this->service->successImport(
//                ImportStatusExcel::TYPE_CLIENT,
//                ImportStatusExcel::STATUS_IMPORT_SUCCESS
//            );
//
//            return redirect()
//                ->route('admin.client.index')
//                ->with('status', 'finished');
//
//        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
//            $failures = $e->failures();
//            $errorRow = array();
//            $errorMessage = array();
//
//            foreach($failures as $failure) {
//                array_push($errorRow, $failure->row());
//                array_push($errorMessage, $failure->errors());
//            }
//
//            $this->service->failedImport(
//                ImportStatusExcel::TYPE_CLIENT,
//                ImportStatusExcel::STATUS_IMPORT_FAILED,
//                $errorRow,
//                $errorMessage
//            );
//
//            ClientExcelImportJob::dispatch($fileExcelPath);
//
//            return redirect()
//                ->route('admin.client.index')
//                ->with('status', 'failed');
//        }


 //   }
//}
