@extends('layout')
@section('content')

<div class="container mt-5 ">
    <div class="row">
        <h2 class="text-center  p-5">User List</h2>
        <div class="col-md-3">
            <button class="btn btn-outline-dark mb-3"  data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>

<!-- Modal -->
<div class="modal fade bg-dark text-light " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark">
      <form action="/" method="POST">
                    @csrf
               
                    <input type="text" name="name" class="form-control mb-2" placeholder="Enter Your Name">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                   
                    <input type="text" name="email" class="form-control mb-2" placeholder="Enter Your Email ">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                   
                    <input type="text" name="password" class="form-control mb-2" placeholder="Enter Your Password">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                
                    <input type="text" name="phone" class="form-control mb-2" placeholder="Enter Your Mobile no.">
                    <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                    <br>
                    <button class="btn btn-outline-light">Add New</button>
                </form>
      </div>
      
    </div>
  </div>
</div>
        </div>
              <!-- If your new your add then display this message -->
              @if(Session::get('status'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('status')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endif

            <!-- If user data update successfull then display this message -->
            @if(Session::get('update'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('update')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endif

              <!-- If user data deleted successfull then display this message -->
              @if(Session::get('deleteUser'))

              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{Session::get('deleteUser')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @endif
        <div class="col-md-12 mx-auto">
            <table class="table table-bordered table-dark">
                <tr class='thead-danger'>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone no.</th>
                    <th>Action</th>
                </tr>
                <!-- {{$i=1}} -->
                @foreach($data as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['email']}}</td>
                    <td>{{$item['phone']}}</td>
                    <td><a href="/update/{{$item['id']}}" class="btn btn-outline-success">Update</a>
                    <a href="/allUser/{{$item['id']}}" class="btn btn-outline-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              
            </table>
        </div>
    </div>
</div>
<div class='col-md-8 mt-3 m-auto'>
{{$data->links()}}

</div>
@endsection

<style>
  .w-5{
    display:none;
  }
</style>