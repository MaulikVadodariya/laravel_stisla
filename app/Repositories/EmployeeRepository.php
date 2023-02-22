<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Employee;
use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }

    public function storeEmployee($input)
    {
        $employee = Employee::create($input);

        return true;
    }
    
    public function updateEmployee($input, $employee)
    {
        $employee->update($input);
        
        return true;
    }
}
