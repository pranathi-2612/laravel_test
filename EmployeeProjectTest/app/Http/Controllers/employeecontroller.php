<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreempRequest;
use App\Models\employee;
use App\Models\company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class employeecontroller extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.employee');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = company::all();  // Get all companies
        return view('employee.create_employee', ['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreempRequest $request)
    {
        $data=[
            'first_name' =>$request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_id' => $request->input('company_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ];

        Employee::create($data);

        return redirect()->route('create_employees')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function empview()
    {
       return view('employee.view_employees');
    }
    public function show()
    {
        $data =Employee::join('company','company.id','employees.company_id')->select('employees.*','company.name as cname')->get();
        
        return DataTables::of($data)
            ->addColumn('action', function ($datas) {
                $editUrl = route('edit_employees', $datas->id);
                return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->addColumn('action2', function ($datas) {
                $deleteUrl = route('delete_employees', $datas->id);
                return '<a href="' . $deleteUrl . '" class="btn btn-sm btn-primary">Delete</a>';
            })
            ->rawColumns(['action','action2'])
            ->make(true);
        // $employees = Employee::with('company')->paginate(10);  // Paginate employees with their company
        // return view('employee.view_employees',['employees'=>$employees]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = company::all();  
        $employees = Employee::find($id);  
        // return response()->json($employees);
        return view('employee.edit_employee',['employees'=>$employees,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:company,id',  // Ensure the company exists
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        Employee::where('id',$id)->update($validated);

        return redirect()->route('empview')->with('success', 'Employee created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       employee::where('id',$id)->delete();
       return redirect('empview');
    }
}
