<?php

namespace App\Console\Commands;

use App\Imports\CultureImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCultureCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import:culture';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импорт показателей культуры';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        $publicPath = public_path('/excel/import/cultura.xlsx');
        Excel::import(new CultureImport(),
            $publicPath

        );
    }
}
