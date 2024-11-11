@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6 offset-3">
            <div class="card p-5">
                <div class="row">
                    <div class="col text-center text-primary"><h4>Create Employees</h4></div>
                </div>
                <form action="{{ route('store_employees') }}" method="POST">
                @csrf

                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="form-control">
                @error('first_name')
                   <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
                @enderror

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control">
                @error('last_name')
                <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
                @enderror

                <label for="company_id">Company:</label>
                <select name="company_id" class="form-control">
                    <option value=" ">Select</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id')
               <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
                @enderror

                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control">
                @error('email')
                <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
                @enderror

                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control">
                @error('phone')
                <div class="row"><strong class="text-danger"> {{$message}}</strong></div>    
                @enderror
                <br>
                <div class="row">
                    <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Create Employee</button>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


