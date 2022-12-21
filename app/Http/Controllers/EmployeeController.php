<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::select('id','name','tel','employee_status')->get();
        // dd($employees);

        return Inertia::render('Employees/Index',[
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Employees/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'employee_status' => $request->employee_status,
            'emergency_name' => $request->emergency_name,
            'emergency_contact' => $request->emergency_contact,
            'emergency_relation' => $request->emergency_relation,
        ]);

            return to_route('employees.index')
            ->with([
                'message' => '登録しました。',
                'status' => 'success'
            ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        // dd($employee);
        return Inertia::render('Employees/Show',[
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return Inertia::render('Employees/Edit',[
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        // dd($item->name, $request->name);
        $employee->name = $request->name;
        $employee->tel = $request->tel;
        $employee->employee_status = $request->employee_status;
        $employee->emergency_name = $request->emergency_name;
        $employee->emergency_contact = $request->emergency_contact;
        $employee->emergency_relation = $request->emergency_relation;
        $employee->save();

        return to_route('employees.index')
        ->with([
            'message' => '更新しました',
            'status' => 'success'
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return to_route('employees.index')->with([
            'message' => '削除しました。',
            'status' => 'danger'
        ]);
    }
}