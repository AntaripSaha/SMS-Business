@extends('layouts.layout')


@section('content')



<body>
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
                        <!-- <li class="sidebar-item">
                                <a href="{{route('msg.send')}}" class='sidebar-link'>
                                    <i class="bi bi-people"></i>
                                    <span>Messaging</span>
                                </a>
                        </li> -->
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
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @include('layouts/flash-msg')
            @yield('content')   

            <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Inputs</h4>
                        </div>

                        <form action="{{route('user.info.edit')}}" method="post">
                            @csrf
                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    
                                        <!-- <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div> -->
                                    
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{$customers[0]->phone}}" required>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="sms_rate">SMS Rate</label>
                                            <input type="text" class="form-control" name="sms_rate" value="{{$customers[0]->sms_rate}}"  required>
                                        </div>
                                       

                                        
                                    </div>
                                    <div class="col-md-6">

                                        <!-- <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" required>
                                        </div> -->
                                        <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control" name="password" value="{{$customers[0]->pass}}" required>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">
                                        Submit
                                </button>
                            </div>

                        </form>    



                    </div>
                </section>

          
        </div>
    </div>
</body>
@endsection