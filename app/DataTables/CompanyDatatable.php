<?php

namespace App\DataTables;

use App\Models\Company;

class CompanyDataTable
{
    /**
     * @return Manager
     */
    public function get()
    {
        /** @var Company $query */
        $query = Company::query()->select('companies.*');

        return $query;
    }
}
