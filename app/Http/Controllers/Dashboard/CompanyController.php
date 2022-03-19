<?php

namespace App\Http\Controllers\Dashboard;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dahsboard\Company\updateRequest;
use App\Http\Requests\Dahsboard\Company\storeRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return inertia()->render('Dashboard/companies/index', [
            'companies' => $companies,
        ]);
    }
    public function create()
    {
        return inertia()->render('Dashboard/companies/create');
    }


    public function store(storeRequest $request)
    {
        Company::create([
            'name' => $request->name
        ]);

      

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Company created successfully'
        ]);

        return redirect()->route('companies.index');
    }


    public function edit(Company $company)
    {
        return inertia()->render('Dashboard/companies/edit', [
            'company' => $company,
        ]);
    }


    public function update(updateRequest $request, Company $company)
    {
        $company->update([
            'name' => $request->name
        ]);


        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Company updated successfully'
        ]);

        return redirect()->route('companies.index');
    }
}
