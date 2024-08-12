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
        <div class="card">
            <div class="card-header">
                Order List
            </div>
            <div class="card-body">
                <table class="table table-bordered table-active">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Paid Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>
                            @if($value->status == 1)
                                <a href="{{ route('orderAdmin.process', $value->id) }}"><span class="badge badge-warning">PROCESSING</span></a>
                            @else
                            <span class="badge badge-success">COMPLETE</span>
                            @endif
                        </td>

                        <td>{{ $value->total }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
