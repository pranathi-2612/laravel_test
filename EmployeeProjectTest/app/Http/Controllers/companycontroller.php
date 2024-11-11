<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecompRequest;
use App\Models\company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class companycontroller extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('company.company');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.createcompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecompRequest $request)
    {
      
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');  // Store logo in 'public/logos' directory
        }

        // Create the company
        company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'email' => $request->input('email')?? null,  // If email is not provided, it's null
            'logo' => $logoPath,  // Save the path of the logo
            'website' =>$request->input('website') 
        ]);

        // Return response
        return redirect('createcompany');  
    }

    /**
     * Display the specified resource.
     */
    public function view()
    {
        return view('company.companyview');
    }
    public function show()
    {

        $data = Company::select(['id', 'name', 'email', 'logo','website', 'created_at']);
        
        return DataTables::of($data)
            ->addColumn('action', function ($datas) {
                $editUrl = route('editcompany', $datas->id);
                return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->addColumn('action1', function ($datas) {
                $editUrl = route('delete_company', $datas->id);
                return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Delete</a>';
            })
            ->addColumn('image', function ($datas) {
                $imageUrl = url('storage/' . $datas->logo);
                return '<img src="' . $imageUrl . '" alt="logo" width="50" height="50">';
            })
            ->rawColumns(['action','action1', 'image'])
            ->make(true);

         // Paginate companies, 10 entries per page
        //  $companies = Company::paginate(10);

         // Return the view with the paginated data
        //  return view('company.companyview', ['companies'=>$companies]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::find($id);
        // return response()->json($companies);
        return view('company.edit_company', ['companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorecompRequest $request, string $id)
    {
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');  // Store logo in 'public/logos' directory
        }

        // Create the company
        company::where('id',$id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'email' => $request->input('email')?? null,  // If email is not provided, it's null
            'logo' => $logoPath,  // Save the path of the logo
            'website' =>$request->input('website') 
        ]);

        // Return response
        // return response()->json("Updated");

        return redirect('view');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Company::where('id',$id)->delete();
        return response()->json("Updated");
        // return redirect('view');  

    }
  
}
