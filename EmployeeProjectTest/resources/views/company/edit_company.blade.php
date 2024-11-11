@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6 offset-3">
            <div class="card p-5">
                <div class="row">
                    <div class="col text-center text-primary"><h4>Create Companies</h4></div>
                </div>
            <form action="{{ url('/update_company',$companies->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Company Name:</label>
        <input type="text" name="name" class="form-control" value="{{$companies->name}}" ><br>

        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" value="{{$companies->email}}"><br>

        <label for="logo">Logo (minimum 100x100):</label>
        <img src="{{url('storage/'.$companies->logo)}}" alt="logo" width="50" height="50">
        <input type="file" name="logo" class="form-control"><br>

        <label for="website">Website:</label>
        <input type="url" name="website" class="form-control" value="{{$companies->website}}"><br>

       <div class="row">
        <div class="col text-center">
        <button type="submit" class="btn btn-primary">Update Company</button>
        </div>
       </div> 
    </form> 
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


