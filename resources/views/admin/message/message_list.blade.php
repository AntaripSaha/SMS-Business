@extends('layouts.layout')


@section('content')

    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                    <div class="sidebar-header">
                        <div class="d-flex justify-content-between">
                            <div class="logo">
                                <a href="{{route('admin.dashboard')}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                            </div>
                            <div class="toggler">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-title">Pages</li>

                            <li class="sidebar-item">
                                <a href="{{route('admin.user')}}" class='sidebar-link'>
                                    <i class="bi bi-people"></i>
                                    <span>Users</span>
                                </a>
                            </li>  
                            <!-- <li class="sidebar-item ">
                                <a href="{{route('msg.send')}}" class='sidebar-link'>
                                    <i class="bi bi-people"></i>
                                    <span>Messaging</span>
                                </a>
                            </li>   -->
                            <li class="sidebar-item active">
                                <a href="{{route('user.message.list')}}" class='sidebar-link'>
                                    <i class="bi bi-people"></i>
                                    <span>Message Request</span>
                                </a>
                            </li>  
                            <li class="sidebar-item">
                                <a href="{{route('database')}}" class='sidebar-link'>
                                    <i class="bi bi-people"></i>
                                    <span>Database</span>
                                </a>
                            </li>  
                        </ul>
                    </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
    </div>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
        @include('layouts/flash-msg')
        @yield('content')  
            <div class="page-heading">
                <!-- Hoverable rows start -->
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Request List</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" style="margin-top:20px; margin-bottom:px !important;">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Area</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                    <th>View</th>
                                                    <!-- <th>Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($messages as $key=>$msg)
                                                <tr>
                                                    <td class="text-bold-500">{{$msg->user->phone}}</td>
                                                    <td class="text-bold-500">{{$msg->database->name}}</td>
                                                    <td>{{ $msg->database->number }}</td>
                                                    <td>
                                                        <!-- Example single danger button -->
                                                    <div class="btn-group">
                                                        @if($msg->status == 0)
                                                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Requested
                                                        </button>
                                                        @elseif($msg->status == 1)
                                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Pending
                                                        </button>
                                                        @elseif($msg->status == 2)
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Processing
                                                        </button>
                                                        @elseif($msg->status == 3)
                                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Completed
                                                        </button>
                                                        @endif
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="{{route('user.message.action', ['status'=> 1, 'id' => $msg->id ])}}" >Pending</a></li>
                                                            <li><a class="dropdown-item" href="{{route('user.message.action', ['status'=> 2, 'id' => $msg->id ])}}">Processing</a></li>
                                                            <li><a class="dropdown-item" href="{{route('user.message.action', ['status'=> 3, 'id' => $msg->id ])}}">Completed</a></li>
                                                        </ul>
                                                    </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <a href="{{route('msg.view', ['id'=>$msg->id])}}" class="btn btn-outline-info btn-sm">View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- <td><div class="row">
                                                            <div class="col-sm-2">
                                                                <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td> -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{$messages->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Hoverable rows end -->           
            </div>
        </div>
    </div>
@endsection