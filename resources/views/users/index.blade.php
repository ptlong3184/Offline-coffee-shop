
@extends('layouts.app')

@section('content')
     <div class="container">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
             <div class="container">
                 @include('layouts.includes.navbar')

                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                     <span class="navbar-toggler-icon"></span>
                 </button>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <!-- Left Side Of Navbar -->
                     <ul class="navbar-nav me-auto">

                     </ul>

                     <!-- Right Side Of Navbar -->
                     <ul class="navbar-nav ms-auto">
                         <!-- Authentication Links -->
                         @guest
                             @if (Route::has('login'))

                                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                             @endif

                             @if (Route::has('register'))
                                 <li class="nav-item">
                                     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                 </li>
                             @endif
                         @else
                             <li class="nav-item dropdown">
                                 {{ Auth::user()->name }}
                             </li>
                         @endguest
                     </ul>
                 </div>
             </div>
         </nav>
         <div class="col-lg-12">
             <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="float: left; color: #eeeeee" > Add User</h4>
                            <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#addUser">
                                <i class="fa fa-plus"></i> Add New User
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=> $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->is_admin == 1) Admin
                                        @else Guest
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target ="#editUser{{ $user->id }}">
                                                <i class="fa fa-edit"></i>Edit
                                            </a>
                                            <a href="#"  class="btn btn-sm btn-danger" data-toggle="modal" data-target ="#deleteUser{{ $user->id }}" ><i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal right fade" id="editUser{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Edit User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>


                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="from-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                                    </div>
                                                    <div class="from-group">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" id="" value="{{$user->email}}" class="form-control">
                                                    </div>
{{--                                                    <div class="from-group">--}}
{{--                                                        <label for="">Phone</label>--}}
{{--                                                        <input type="text" name="phone" id="" value="{{$user->phone}} class="form-control">--}}
{{--                                                    </div>--}}
                                                    <div class="from-group">
                                                        <label for="">Password</label>
                                                        <input type="password" name="password"  id="" value="{{$user->password}}"  class="form-control">
                                                    </div>
{{--                                                    <div class="from-group">--}}
{{--                                                        <label for="">Confirm Password</label>--}}
{{--                                                        <input type="password" name="confirm_password" id="" class="form-control">--}}
{{--                                                    </div>--}}
                                                    <div class="from-group">
                                                        <label for="">Role</label>
                                                        <select name="is_admin" id="" class="form-control">
                                                            <option value="1" @if($user->is_admin ==1)
                                                                                  selected
                                                            @endif>Admin</option>
                                                            <option value="2" @if($user->is_admin ==2)
                                                                                  selected
                                                            @endif>Guest</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-warning btn-block"> Update User</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal right fade" id="deleteUser{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Delete User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>


                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <p>Are you sure you want to delete {{$user->name}}?</p>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-default" data-dismiss="modal"> Cancel </button>
                                                        <button type="submit" class="btn btn-dangert" > Delete </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3">
                     <div class="card">
                         <div class="card-header"> <h4 style="color: #eeeeee">Users</h4> </div>
                         <img src="https://i.pinimg.com/564x/5f/40/6a/5f406ab25e8942cbe0da6485afd26b71.jpg">
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="modal right fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form action="{{ route('users.store') }}" method="post">
                         @csrf
                         <div class="from-group">
                             <label for="">Name</label>
                             <input type="text" name="name" id="" class="form-control">
                         </div>
                         <div class="from-group">
                             <label for="">Email</label>
                             <input type="email" name="email" id="" class="form-control">
                         </div>
{{--                         <div class="from-group">--}}
{{--                             <label for="">Phone</label>--}}
{{--                             <input type="text" name="phone" id="" class="form-control">--}}
{{--                         </div>--}}
                         <div class="from-group">
                             <label for="">Password</label>
                             <input type="password" name="password" id="" class="form-control">
                         </div>
{{--                         <div class="from-group">--}}
{{--                             <label for="">Confirm Password</label>--}}
{{--                             <input type="password" name="confirm_password" id="" class="form-control">--}}
{{--                         </div>--}}
                         <div class="from-group">
                             <label for="">Role</label>
                             <select name="is_admin" id="" class="form-control">
                                 <option value="1">Admin</option>
                                 <option value="2">Guest</option>
                             </select>
                         </div>
                         <div class="modal-footer">
                             <button class="btn btn-primary btn-block"> Save User</button>
                         </div>

                     </form>
                 </div>

             </div>

         </div>

     </div>





    <style>
        .modal.right .modal-dialog{
            /*position:absolute;*/
            top: 0;
            right: 0;
            margin-right: 20vh;
        }

        .modal.fade:not(.in).right .modal-dialog{
            -webkit-transform: translate3d(25%,0,0);
            transform: translate3d(25%,0,0);
        }

        .card-header{
            background-color: #873600;
        }

    </style>

@endsection

