@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto card bg-dark text-white mt-5">
            <div class="card-header">
                <h3 class=" text-center p-2">Update User</h3>
            </div>
            <div class="card-body">

          

                <form action="update" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['id']}}" class="form-control mb-2" placeholder="Enter Your Name">
               <lable>Name</lable>
                    <input type="text" name="name" value="{{$data['name']}}" class="form-control mb-2" placeholder="Enter Your Name">
                   <lable>Email</lable>
                    <input type="text" name="email" value="{{$data['email']}}" class="form-control mb-2" placeholder="Enter Your Email ">
                <lable>Mobile Number</lable>
                    <input type="text" name="phone" value="{{$data['phone']}}" class="form-control mb-2" placeholder="Enter Your Mobile no.">
                    <br>
                    <button class="btn btn-outline-light">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection