<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeePostRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    //
    public function index()
    {

        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create(Company $company)
    {
        $companies = $company->get(['id', 'name']);
        \Debugbar::info($companies);
        return view('admin.employees.create', compact('companies'));
    }

    public function store(EmployeePostRequest $request, Employee $model, Company $company)
    {

        $model->create($request->all());

        return redirect()->route('employees.index')->withStatus(__('Employee successfully created.'));
    }

    public function edit(Employee $employee, Company $company)
    {
        $companies = $company->get(['id', 'name']);
        return view('admin.employees.edit', compact('employee', 'companies'));
    }

    public function update(EmployeePostRequest $request, Employee $employee, Company $company)
    {
        \Debugbar::info($company);
        \Debugbar::info($request->all());
        $employee->update($request->all());

        return redirect()->route('employees.index')->withStatus(__('Employee successfully updated.'));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->withStatus(__('Employee successfully deleted.'));
    }

}
