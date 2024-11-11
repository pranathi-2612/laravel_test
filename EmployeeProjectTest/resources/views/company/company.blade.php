@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="col-md-6 offset-3">
                    <div class="row p-4">
                    <a href="{{route('createcompany')}}" class="btn btn-primary">Add Companies</a>
                    </div>
                    <div class="row p-4">
                    <a href="{{route('view')}}" class="btn btn-primary">View Companies</a>
                    </div>
                </div>   
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
