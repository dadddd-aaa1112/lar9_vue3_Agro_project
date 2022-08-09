<?php

namespace App\Jobs;

use App\Models\ImportStatusExcel;
use App\Imports\ClientImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ClientExcelImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $fileExcelPath;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fileExcelPath)
    {

        $this->fileExcelPath = $fileExcelPath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        //$readerType = check_extends_file_job($this->fileExcelPath);

        try {


        Excel::import(new ClientImport,
            $this->fileExcelPath,
            'public',
            \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Exception $ex) {
            return back()->withError('something wrong');
        }

        return redirect()->route('admin.client.index')->withMessage('success');

    }
}
