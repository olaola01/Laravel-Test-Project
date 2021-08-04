<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('employee.index')->with('employees', Employee::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('employee.create')
            ->with('companies', Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateEmployeeRequest $request)
    {
//        dd($request->company_id);
        Employee::create([
            'first_name' => $request->first_name,
            'last_name'=> $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id
        ]);

        session()->flash('success', 'Employee created successfully');
        return redirect(route('employee.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        return view('employee.create')->with('employee', $employee)->with('companies', Company::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
//        dd($request->all());
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id
        ]);

        session()->flash('success', 'Employee Details Updated successfully');
        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        session()->flash('success', 'Employee deleted successfully');
        return redirect()->back();
    }
}
