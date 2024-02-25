<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        if ($employees->count() > 0) {
            return response()->json([
                'status' => 200,
                'employees' => $employees
            ], 200);
        } else {

            return response()->json([
                'status' => 404,
                'message' => 'No Records'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'employee_id' => 'required|id|max:191',
            'name' => 'required|string|max:191',
            'job_title' => 'required|string|max:191',
            'salary' => 'required|decimal:0',
            'department' => 'required|string|max:191',
            'joined_date' => 'required|date|max:191',
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $employees = Employee::create([
                //'employee_id' => $request->id,
                'name' => $request->name,
                'job_title' => $request->job_title,
                'salary' => $request->salary,
                'department' => $request->department,
                'joined_date' => $request->joined_date,
            ]);

            if($employees){

                return response()->json([
                    'status' => 200,
                    'messsage' => "Employee Created Succesfully"
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'messsage' => "Something Went Wrong"
                ], 500);
            }
        }
    }

    public function show($id){
        $employee = Employee::find($id);
        if($employee){
            return response()->json([
                'status' => 200,
                'employee' => $employee
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'messsage' => "No Employee Found"
            ], 404);
        }
    }

    public function edit($id){
        $employee = Employee::find($id);
        if($employee){
            return response()->json([
                'status' => 200,
                'employee' => $employee
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'messsage' => "No Employee Found"
            ], 404);
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            //'employee_id' => 'required|id|max:191',
            'name' => 'required|string|max:191',
            'job_title' => 'required|string|max:191',
            'salary' => 'required|decimal:0',
            'department' => 'required|string|max:191',
            'joined_date' => 'required|date|max:191',
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            $employees = Employee::find($id);

            if($employees){
                $employees->update([
                    //'employee_id' => $request->id,
                    'name' => $request->name,
                    'job_title' => $request->job_title,
                    'salary' => $request->salary,
                    'department' => $request->department,
                    'joined_date' => $request->joined_date,
                ]);

                return response()->json([
                    'status' => 200,
                    'messsage' => "Employee Updated Succesfully"
                ], 200);
            }else{
                return response()->json([
                    'status' => 404,
                    'messsage' => "No Employee Found"
                ], 404);
            }
        }
    }

    public function destroy($id){
        $employees = Employee::find($id);
        if($employees){
            $employees->delete();
            return response()->json([
                'status' => 200,
                'messsage' => "Employee Deleted"
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'messsage' => "No Employee Found"
            ], 404);
        }
    }
}
