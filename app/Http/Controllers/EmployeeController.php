<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company')->latest()->paginate(10);
        return view('employees\index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees\create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create([
            'First_Name' => $request->First_Name,
            'Last_Name' => $request->Last_Name,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'company_id' => $request->company_id
        ]);
        if(app()->isLocale('en'))
        return redirect('/employees')->with('success','employee inserted successfully!');
        else
        return redirect('/employees')->with('success','تم اضافة الموضف بنجاح !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees\edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'First_Name' => $request->First_Name,
            'Last_Name' => $request->Last_Name,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'company_id' => $request->company_id
        ]);

        if(app()->isLocale('en'))
        return redirect('/employees')->with('success','employee Updated successfully!');
        else
        return redirect('/employees')->with('success','تم تعديل الموضف بنجاح !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        if(app()->isLocale('en'))
        return redirect('/employees')->with('success','employee Deleted successfully!');
        else
        return redirect('/employees')->with('success','تم حذف الموضف بنجاح !');
    }
}
