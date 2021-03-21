@extends('layouts.app')
@section('title')
    Laravel Coding Test
@endsection
@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row">
           <div class="col-md-10 mx-auto">
               <a href="/employees/create" class="btn btn-primary text-center w-100 my-3"> Add New Employee</a>
        <table class="table ">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Designation</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                
                </tr>
            </thead>
            <tbody>
             
                <tr>
                <th scope="row">{{$employee->id}}</th>
                <td>{{$employee->name}}</td>
                <td>{{$employee->designation}}</td>
                <td>{{$employee->employee_info->address??''}}</td>
                <td>{{$employee->employee_info->phone??''}}</td>
                <td>{{$employee->employee_info->email??''}}</td>
               
                </tr>  
              
                
            
            </tbody>
            </table>


           </div>
        </div>
    </div>
  
@endsection
