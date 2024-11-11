@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6 offset-3">
            <div class="card p-5">
                <div class="row">
                    <div class="col text-center text-primary"><h4>Create Companies</h4></div>
                </div>
            <form action="{{ url('/company_reg') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Company Name:</label>
        <input type="text" name="name" class="form-control" >
        @error('name')
             <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
        @enderror
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control">
        @error('email')
             <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
        @enderror
      
        <label for="logo">Logo (minimum 100x100):</label>
        <input type="file" name="logo" class="form-control">
        @error('logo')
             <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
        @enderror
        <label for="website">Website:</label>
        <input type="url" name="website" class="form-control">
        @error('website')
             <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
        @enderror
        <br>
       <div class="row">
        <div class="col text-center">
        <button type="submit" class="btn btn-primary">Create Company</button>
        </div>
       </div> 
    </form> 
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


