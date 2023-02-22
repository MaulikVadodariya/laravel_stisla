<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Repositories\CompanyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Intervention\Image\Facades\Image;
use Response;
use Datatables;
use App\Models\Company;

class CompanyController extends AppBaseController
{

       /** @var  CompanyRepository */
       private $companyRepository;

       public function __construct(CompanyRepository $companyRepo)
       {
           $this->companyRepository = $companyRepo;
       }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      
        if ($request->ajax()) {
            return Datatables::of((new CompanyDataTable())->get())->make(true);
        }

        return view('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $request)
    {
         $input = $request->all();

         $this->companyRepository->storeCompany($input);

         Flash::success('Company saved successfully.');

         return redirect(route('companies.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));  
    }


    /**
     * @param  Company  $company
     * @param  UpdateCompanyRequest  $request
     *
     *
     */
    public function update(Company $company, UpdateCompanyRequest $request)
    {
        $input = $request->all();
        
        $company = $this->companyRepository->updateCompany($input, $company);

        Flash::success('Company updated successfully.');

        return redirect(route('companies.index'));
    }

    
    public function destroy(Company $company)
    {
        $company->employees()->delete();

        $company->delete();

        return $this->sendSuccess('Company deleted successfully.');
    }
}
