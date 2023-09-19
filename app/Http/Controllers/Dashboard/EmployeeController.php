<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations = Designation::all();
        return view('backend.employee.create', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $formRequest = $request->validated();

        $newImage = time() . '-' . $request->employee_image->getClientOriginalName();
        $request->employee_image->move(public_path('images'), $newImage);
        $formRequest['employee_image'] = $newImage;

        Employee::create($formRequest);
        return redirect()->route('employee.index')->with('success', 'Employee created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd('hello');
        $employee = Employee::find($id);
        $designations = Designation::all();
        return view('backend.employee.edit', compact('employee', 'designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $formRequest = $request->validated();

        $formRequest = $request->validate([
            'name' => 'required',
            'email' => "required|unique:employees,email,".$id,
            'phone' => "required|unique:employees,phone,".$id,
            'designation_id' => 'required',
        ]);

        if ($request->hasFile('employee_image')) {
            $formRequest = $request->validate([
                'employee_image' => 'mimes:jpeg,png,jpg',
            ]);

            $newImage = time() . '-' . $request->employee_image->getClientOriginalName();
            $request->employee_image->move(public_path('images'), $newImage);
            $formRequest['employee_image'] = $newImage;
        }

        Employee::where('id', $id)->update($formRequest);
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::Where('id', $id)->delete();
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully !!');
    }
}
