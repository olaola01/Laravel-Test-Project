<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use http\Env\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('company.index')
            ->with('companies', Company::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCompanyRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCompanyRequest $request)
    {
        Company::create([
            'name' =>$request->name,
            'email' => $request->email,
            'website' => $request->website
        ]);

        session()->flash('success', 'Company created successfully');
        return redirect(route('companies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $company)
    {
        return view('company.create')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompanyRequest $request
     * @param \App\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website
        ]);

        session()->flash('success', 'Company Details Updated successfully');
        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        $company->delete();

        session()->flash('success', 'Company deleted successfully');
        return redirect()->back();
    }
}
