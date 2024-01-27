<?php

namespace App\Http\Controllers\admin;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            $name_id = Str::uuid();
            $file=$request->file('logo');
            $fileName = $name_id . '.' .pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
             Storage::disk('public')->put('uploads/companies/images/' .$fileName, File::get($file));
        }
        $company =  Company::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'website' => $request->get('website'),
            'logo' => $fileName ?? null,
        ]);
        return redirect()->route('companies.index')->with('success', 'Company has been added');
    }
        catch (\Exception $e) {
            // Handle the exception (e.g., company not found)
            return redirect()->route('companies.index')->with('error', 'Company not found');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        return view('companies.details', compact('company'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $company = Company::find($id);
        $name_id = Str::uuid();
        if ($request->hasFile('logo') && $company->logo) {
            $fileName='/uploads/companies/images/'.$company->logo;
            $dele= Storage::disk('public')->delete($fileName);
           if($dele){
            $file=$request->file('logo');
            $fileName = $name_id . '.' .pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            Storage::disk('public')->put('uploads/companies/images/' .$fileName, File::get($file));
           }
        } else {
            $fileName = $company->logo;
        }
        $company->name =  $request->get('name');
        $company->email =  $request->get('email');
        $company->website =  $request->get('website');
        $company->logo =  $fileName;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company has been updated');
    } catch (\Exception $e) {
        // Handle the exception (e.g., company not found)
        return redirect()->route('companies.index')->with('error', 'Company not found');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $company = Company::find($id);
        $fileName='/uploads/companies/images/'.$company->logo;
        Storage::disk('public')->delete($fileName);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company has been deleted');

    }
}
