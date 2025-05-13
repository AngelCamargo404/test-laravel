<?php

// app/Console/Commands/FetchDataCommand.php
namespace App\Console\Commands;

use App\Jobs\ProcessEmployee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Jobs\ProcessEmployeeData;

class FetchDataCommand extends Command
{
    protected $signature = 'fetch-data';
    protected $description = 'Fetch employee data from API';

    public function handle()
    {
        $response = Http::get('http://dummy.restapiexample.com/api/v1/employees');

        if ($response->successful()) {
            $employees = $response->json()['data'];
            
            foreach ($employees as $employee) {
                ProcessEmployee::dispatch($employee);
            }

            $this->info(count($employees) . ' employees dispatched to queue!');
        } else {
            $this->error('Failed to fetch data from API');
        }
    }
}