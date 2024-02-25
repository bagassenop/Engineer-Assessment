<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        if ($sales->count() > 0) {
            return response()->json([
                'status' => 200,
                'sales' => $sales
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
            'employee_id' => ['required',
            Rule::exists('employees','employee_id')->where(function ($query) {
                return $query->whereNotNull('employee_id');
                }
            )],
            //'exists:employees,employee_id'.$request->store("employee_id"),
            'sales' => 'required|decimal:0',
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $sales = Sales::create([
                'employee_id' => $request->get('employee_id'),
                'sales' => $request->sales,
            ]);

            if($sales){

                return response()->json([
                    'status' => 200,
                    'messsage' => "Sales Nominal Inserted Succesfully"
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
        $sale = Sales::find($id);
        if($sale){
            return response()->json([
                'status' => 200,
                'sale' => $sale
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'messsage' => "No sales Found"
            ], 404);
        }
    }

    public function edit($id){
        $sale = Sales::find($id);
        if($sale){
            return response()->json([
                'status' => 200,
                'sale' => $sale
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'messsage' => "No sales Found"
            ], 404);
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'employee_id' => ['required',
            Rule::exists('employees','employee_id')->where(function ($query) {
                return $query->whereNotNull('employee_id');
                }
            )],
            //'exists:employees,employee_id'.$request->store("employee_id"),
            'sales' => 'required|decimal:0',
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            $sales = Sales::find($id);

            if($sales){
                $sales->update([
                    'employee_id' => $request->get('employee_id'),
                    'sales' => $request->sales,
                ]);

                return response()->json([
                    'status' => 200,
                    'messsage' => "sale Updated Succesfully"
                ], 200);
            }else{
                return response()->json([
                    'status' => 404,
                    'messsage' => "No sale Found"
                ], 404);
            }
        }
    }

    public function destroy($id){
        $sales = Sales::find($id);
        if($sales){
            $sales->delete();
            return response()->json([
                'status' => 200,
                'messsage' => "sale Deleted"
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'messsage' => "No sale Found"
            ], 404);
        }
    }
}
