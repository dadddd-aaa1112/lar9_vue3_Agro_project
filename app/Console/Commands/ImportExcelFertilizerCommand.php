<?php

namespace App\Console\Commands;

use App\Imports\FertilizerImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelFertilizerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import:fertilizer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импорт показателей';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        $pathFile = public_path('/excel/import/first.xlsx');
        Excel::import(new FertilizerImport(), $pathFile);
    }
}
