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
                            <li class="sidebar-item ">
                                <a href="{{route('msg.send')}}" class='sidebar-link'>
                                    <i class="bi bi-people"></i>
                                    <span>Messaging</span>
                                </a>
                            </li>
                            <li class="sidebar-item ">
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
        @include('layouts/flash-msg')
        @yield('content')  
            <div class="page-heading">
         
                <!-- Basic choices start -->
                <section class="basic-choices">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Send SMS</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group mb-2">
                                                        <label for="exampleFormControlTextarea1" class="form-label">SMS Content</label>
                                                            <textarea class="form-control" name="msg" rows="8">{{$message[0]->message}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection    