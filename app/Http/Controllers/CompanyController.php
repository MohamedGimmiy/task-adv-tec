<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesRequest;
use App\Models\Company;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies  = Company::latest()->paginate(10);

        return view('companies\index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompaniesRequest $request)
    {
        if($request->hasFile('Logo')){
            $fileName = time() . '.' . $request->file('Logo')->getClientOriginalExtension();

            Storage::disk('public')->putFileAs('images', $request->file('Logo'), $fileName);
            Company::create([
                'Name' => $request->Name,
                'Email' => $request->Email,
                'Logo' =>  $fileName,
                'Website' => $request->Website
            ]);
        }
        else{
            Company::create([
                'Name' => $request->Name,
                'Email' => $request->Email,
                'Website' => $request->Website
            ]);
        }
        if(app()->isLocale('en'))
        return redirect('/companies')->with('success','company created successfully');
        else
        return redirect('/companies')->with('success','تم اضافة الشركة بنجاح !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies\edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompaniesRequest $request, Company $company)
    {
        if($request->hasFile('Logo')){
            Storage::disk('public')->delete('/storage/images/'.$company->Logo);
            $fileName = time() . '.' . $request->file('Logo')->getClientOriginalExtension();

            Storage::disk('public')->putFileAs('images', $request->file('Logo'), $fileName);

            $company->update([
                'Name' => $request->Name,
                'Email' => $request->Email,
                'Logo' =>  $fileName,
                'Website' => $request->Website
            ]);
        }
        else{
            $company->update([
                'Name' => $request->Name,
                'Email' => $request->Email,
                'Website' => $request->Website
            ]);
        }
        if(app()->isLocale('en'))
        return redirect('/companies')->with('success','company updated successfully');
        else
        return redirect('/companies')->with('success','تم تعديل الشركة بنجاح !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if($company->Logo != null){
            Storage::disk('public')->delete( 'images/'.$company->Logo);
        }
        $company->delete();

        if(app()->isLocale('en'))
        return redirect('/companies')->with('success','company deleted successfully');
        else
        return redirect('/companies')->with('success','تم حذف الشركة بنجاح !');
    }
}
