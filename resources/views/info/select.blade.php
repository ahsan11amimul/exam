@extends('layouts.app')
@section('title')
    Laravel Coding Test
@endsection
@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row">
         <div class="col-md-10 mx-auto">
            
         
            <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
              
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>                
                <th scope="col">Action</th>                

                </tr>
            </thead>
              <tbody>  
              <form action="{{url('employee/store_info')}}" method="post">
                @csrf
                @foreach ($employees_data as $item)
                <tr>
                
                <td>{{$item->name}}</td>
                <td><input type="text" name="address[]" /></td>
                <td><input type="text" name="phone[]" /></td>
                <td><input type="text" name="email[]" /></td>
                <input type="hidden" name="id[]" value="{{$item->id}}">

                <td><a href="{{url('/info/'.$item->id)}}" class="btn btn-danger">Remove</button></a>
              
              
             
                </tr>  
                @endforeach
                <tr>
                    <td><button type="submit" class="btn btn-primary w-100">Submit</button></td>
                </tr>
               </form>
                
          
            </tbody>
           
           </form>
            </table>   
        

           </div>
        </div>
    </div>
    <script>

@endsection
