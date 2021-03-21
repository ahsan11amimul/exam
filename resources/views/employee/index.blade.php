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
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->designation}}</td>
                <td>
                    <a href="employees/{{$item->id}}/edit" class="btn btn-primary">Edit</a>
                   <a href="employees/{{$item->id}}/show" class="btn btn-secodary">Show</a>
                    <button class="btn btn-danger delete" emp_id="{{$item->id}}" >Delete</button>
                </td>
                </tr>  
                @endforeach
                
            
            </tbody>
            </table>


           </div>
        </div>
    </div>
    <script>
$(document).ready(function () {
     $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
         });

        $('.delete').click(function(){
        // event.preventDefault();
         var id = $(this).attr('emp_id');
         $.ajax({
             url:'employees/'+id,
             type:'DELETE',
             data: id,
             success:function(response){
             alert(response.message);
             }
         })
        
        });
        });
    </script>
@endsection
