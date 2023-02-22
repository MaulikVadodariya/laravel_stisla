<?php

namespace App\DataTables;

use App\Models\Employee;

class EmployeeDatatable
{
    /**
     * @return Manager
     */
    public function get()
    {
        /** @var Company $query */
        $query = Employee::query()->select('employees.*')->with('company');

        return $query;
    }
}
