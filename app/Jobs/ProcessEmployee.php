<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Employee;

class ProcessEmployee implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private array $employeeData
    ) {}

    public function handle()
    {
        Employee::create([
            'name' => $this->employeeData['employee_name'],
            'salary' => $this->employeeData['employee_salary'],
            'age' => $this->employeeData['employee_age'],
        ]);
    }
}