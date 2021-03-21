@extends('layouts.app')
@section('title')
    Laravel Coding Test
@endsection
@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row">
         <div class="col-md-10 mx-auto">
             <form action="{{ route('search') }}" method="GET" class="m-2">
                <div class="row">
                    <div class="col-9">
                         <input type="text" class="form-control" name="search" placeholder="search here..." required/>
                    </div>
                    <div class="col-3">
                         <button type="submit" class="btn btn-danger btn-block">Search</button>  
                    </div>
                
               
                </div>
            
             </form>
          @if ($employees->count()>0)
            <table class="table table-bordered">
          
              <tbody>  
               <form action="/employee/info" method="GET">
                @foreach ($employees as $item)
                <tr>
                
                <td>{{$item->name}}</td>
              
              
                <td>
                  <label> <input type="checkbox" name="names[]" value="{{$item->id}}">Select</label>
                </td>
                </tr>  
                @endforeach
                <tr>
                    <td>   <button type="submit" class="btn btn-secondary btn-block">Sellect All</button></td>
                </tr>
                
          
            </tbody>
           
           </form>
            </table>   
          @else
              <h1 class="m-4 text-danger text-center">Nothing to show according to your search...</h1>
          @endif
       
         

           </div>
        </div>
    </div>
   
@endsection
