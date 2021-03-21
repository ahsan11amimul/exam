<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employee_info;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees=Employee::all();
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
         'name'=>'required|min:3',
         'designation'=>'required|min:3'
        ]);
        Employee::create($data);
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('employee.show',\compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
       $data=$request->validate([
         'name'=>'required|min:3',
         'designation'=>'required|min:3'
        ]);
       $employee->update($data);
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return response()->json([
            'message'=>'Employee data deleted successfully'
        ],200);
    }
    public function info()
    {

        $employees=Employee::all();
        return view('info.index',compact('employees'));
    }
    public function delete_info($id)
    {
        $employee_info=Employee_info::where('employee_id',$id)->first();
        $employee_info->delete();
        return \redirect('/info');
    }
    public function search(Request $request)
    {
         $search = $request->input('search');
         $employees = Employee::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->get();
        return view('info.index', compact('employees'));
    }
    public function get_info(Request $request)
    {   $employees_data=[];
        $names=$request->get('names');
        if(!$names)
        {
            return back();
        }
        foreach($names as $name)
        {
           $employee=Employee::where('id',$name)->first();
           array_push($employees_data,$employee);
        }
       return view('info.select',\compact('employees_data'));
    }
    public function store_info(Request $request)
    {
        $data=$request->all();
        $length=count($data['id']);
       
        for($i=0;$i<$length;$i++)
        {
               $employee_info=new Employee_info();
               $employee_info->employee_id=$data['id'][$i];
               $employee_info->address=$data['address'][$i];
               $employee_info->phone=$data['phone'][$i];
               $employee_info->email=$data['email'][$i];
               $employee_info->save();
            
        }
       
        // foreach($data as $item)
        // {
          
        //     
        //     $employee_info->employee_id=$item->id;
        //     $employee_info->address=$item->address;
        //     $employee_info->phone=$item->phone;
        //     $employee_info->email=$item->email;
        //     $employee_info->save();


        // }
        return redirect('/employees');
    }
}
