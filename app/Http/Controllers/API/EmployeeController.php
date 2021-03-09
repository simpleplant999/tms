<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'employee_id' => ['required', 'string', 'max:255', 'unique:employees'],
            'name' => ['required', 'string', 'max:255']
        ]);


        return Employee::create([
            'employee_id' => $request['employee_id'],
            'name' => $request['name'],
            'qrcode' => Str::random(32)
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        
        $this->validate($request,[
            'employee_id' => ['required', 'string', 'max:255', 'unique:employees,employee_id,'.$employee->id],
            'name' => ['required', 'string', 'max:255']
        ]);

        $employee->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();
    }
}
