@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6 offset-3">
            <div class="card p-5">
                <div class="row">
                    <div class="col text-center text-primary"><h4>Edit Employees</h4></div>
                </div>
            
        
                <form action="{{ route('update_employees',$employees->id)}}" method="POST">
                @csrf

                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="form-control" value="{{$employees->first_name}}"><br>

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control" value="{{$employees->last_name}}" required><br>

                <label for="company_id">Company:</label>
                <select name="company_id" class="form-control" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select><br>

                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{$employees->email}}"><br>

                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{$employees->phone}}"><br>
                <div class="row">
                    <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Update Employee</button>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


