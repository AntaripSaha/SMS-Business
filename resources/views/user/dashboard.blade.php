@include('layouts/layout')
@yield('content') 

<body>


    <div id="app">
         <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{route('user.campaign')}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Balance: {{$customer->balance}}</li>

                        <li class="sidebar-item  ">
                            <a href="{{route('user.campaign')}}" class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>Campaign</span>
                            </a>
                        </li>
                       

                        <li class="sidebar-item active ">
                            <a href="{{route('client.home')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Reports</span>
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

          
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                @include('layouts/flash-msg')
                @yield('content')   

                <div class="page-heading">
                    <h3>Reports</h3>
                </div>
                <div class="page-content">
                                   <!-- Hoverable rows start -->
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Messages List</h4>
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
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($messages as $key=>$msg)
                                                <tr>
                                                    <td class="text-bold-500">{{$msg->database->name}}</td>
                                                    <td class="text-bold-500">{{Str::limit($msg->message, 30)}}</td>
                                                    <td class="text-bold-500">{{$msg->database->number}}</td>
                                                    <td>
                                                        <!-- Example single danger button -->
                                                    <div class="btn-group">
                                                        @if($msg->status == 0)
                                                        <button type="button" class="btn btn-warning btn-sm">
                                                            Submitted
                                                        </button>
                                                        @elseif($msg->status == 1)
                                                        <button type="button" class="btn btn-secondary btn-sm">
                                                            Pending
                                                        </button>
                                                        @elseif($msg->status == 2)
                                                        <button type="button" class="btn btn-info btn-sm">
                                                            Processing
                                                        </button>
                                                        @elseif($msg->status == 3)
                                                        <button type="button" class="btn btn-success btn-sm">
                                                            Completed
                                                        </button>
                                                        @endif
                                                    </div>
                                                    </td>
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
</body>
