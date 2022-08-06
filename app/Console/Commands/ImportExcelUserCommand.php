<?php

namespace App\Console\Commands;

use App\Imports\UserImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импорт user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        $filePath = public_path('/excel/import/user.xlsx');
        Excel::import(new UserImport(), $filePath);
    }
}
