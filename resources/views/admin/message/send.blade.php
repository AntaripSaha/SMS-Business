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
                            <!-- <li class="sidebar-item active">
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
         


            <form action="{{route('msg.store')}}" method="POST">
                @csrf

                <!-- Basic choices start -->
                <section class="basic-choices">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Send SMS</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                <label class="form-label">Select Number</label>
                                                    <select class="choices form-select" name="operator">
                                                        <option value="+8801713702979">01713702979</option>
                                                        <option value="+8801713702977">01713702977</option>
                                                        <option value="+8801513702977">01513702977</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group mb-2">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Enter Mobile Numbers</label>
                                                            <textarea class="form-control" name="number" id="exampleFormControlTextarea1" rows="2" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group mb-2">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Enter SMS Content</label>
                                                            <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" onkeyup="counter(this.value)" rows="2" maxlength="2295" ></textarea>
                                                            <span id=charcount></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm" style="margin-left: 20px; margin-bottom:10px;">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
              

            </form>
            </div>
        </div>
    </div>


<script>
function counter(str){
    var count = str.length;
    var max = 2295 - count;
    var sms = 1;

    document.getElementById("charcount").innerHTML = count + ' Characters | ' + max +' Characters Left | '+ sms +' SMS (160 Char./SMS)';

}
</script>

@endsection