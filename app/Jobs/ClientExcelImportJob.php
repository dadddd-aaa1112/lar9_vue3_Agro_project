<?php

namespace App\Jobs;

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
        //
        $this->fileExcelPath = $fileExcelPath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Excel::import(new ClientImport(), $this->fileExcelPath, 'public');
    }
}
