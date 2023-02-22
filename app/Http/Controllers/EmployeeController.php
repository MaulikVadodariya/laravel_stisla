<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDatatable;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;    

class EmployeeController extends AppBaseController
{

    /** @var  EmployeeRepository */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new EmployeeDataTable())->get())->make(true);
        }

        return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');
        
        return view('employees.create' , compact('companies'));
    }

    
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();

        $this->employeeRepository->storeEmployee($input);

        Flash::success('Employee saved successfully.');

        return redirect(route('employees.index'));

    }

     
    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }


    public function edit(Employee $employee)
    {
        $companies = Company::pluck('name','id');
        
        return view('employees.edit',compact('employee','companies'));
    }


  
    public function update(Employee $employee, UpdateEmployeeRequest $request)
    {
        $input = $request->all();

        $employee = $this->employeeRepository->updateEmployee($input, $employee);

        Flash::success('Employee updated successfully.');

        return redirect(route('employees.index'));
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return $this->sendSuccess('Employee deleted successfully.');
    }
}
