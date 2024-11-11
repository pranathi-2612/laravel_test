@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="col-md-6 offset-3">
                    <div class="row p-4">
                    <a href="{{route('create_employees')}}" class="btn btn-primary">Add Employees</a>
                    </div>
                    <div class="row p-4">
                    <a href="{{route('empview')}}" class="btn btn-primary">View Employees</a>
                    </div>
                </div>   
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
