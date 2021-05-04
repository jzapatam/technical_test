<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompanyPostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;


class CompanyController extends Controller
{
    //
    public function index()
    {

        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(CompanyPostRequest $request, Company $model)
    {

        $model->create($request->merge([
            'logo' => $request->image ? $request->image->store('logos', 'public') : null,
        ])->all());

        return redirect()->route('companies.index')->withStatus(__('Company successfully created.'));
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(CompanyPostRequest $request, Company $company)
    {
        \Debugbar::info($company);
        \Debugbar::info($request->all());
        $company->update(
            $request->merge([
                'logo' => $request->image ? $request->image->store('profile', 'public') : $company->logo
            ])->all());

        return redirect()->route('companies.index')->withStatus(__('Company successfully updated.'));
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->withStatus(__('Company successfully deleted.'));
    }

}
