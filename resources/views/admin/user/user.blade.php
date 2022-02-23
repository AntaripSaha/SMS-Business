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

                            <li class="sidebar-item active">
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
            
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All Users</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                            <!-- Hoverable rows start -->
                            <section class="section">
                                <div class="row" id="table-hover-row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <a href="{{route('add.user')}}">
                                                   <button type="button" class="btn btn-info btn-sm">
                                                       Add User
                                                   </button>
                                                   </a>
                                                </div>
                                                <!-- table hover -->
                                                <div  class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Customer</th>
                                                                <th>Balance</th>
                                                                <th>SMS Rate</th>
                                                                <th>Balance</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $i = 1;
                                                            @endphp
                                                            @foreach($customers as  $key=>$customer)
                                                            <tr>
                                                                <td class="text-bold-500">{{$i}}</td>
                                                                <td class="text-bold-500">{{$customer->phone}}</td>
                                                                <td>{{$customer->balance}}</td>
                                                                <td>{{$customer->sms_rate}}</td>
                                                                <td>
                                                                    <div class="col-sm-2">
                                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$customer->id}}" data-bs-whatever="@mdo">Add</button>
                                                                            <div class="modal fade" id="exampleModal-{{$customer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">{{$customer->name}}</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                                                                                                @csrf
                                                                                                <input type="hidden" class="form-control" name="id" value="{{$customer->id}}">
                                                                                                <div class="mt-radio-inline">
                                                                                                    <label class="mt-radio">
                                                                                                    <input type="hidden" name="user_id" id="user_id" value="{{$customer->id}}">
                                                                                                        <input type="radio" name="transactionType" value="CREDIT" checked=""> Credit
                                                                                                        <span></span>
                                                                                                    </label>
                                                                                                    <label class="mt-radio">
                                                                                                        <input type="radio" name="transactionType" value="DEBIT"> Debit
                                                                                                        <span></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div class="mb-3">
                                                                                                    <label class="col-form-label">Transaction Amount:</label>
                                                                                                    <input type="text" class="form-control" name="balance_in" value="0">
                                                                                                </div>
                                                                                                <div class="mt-5">
                                                                                                    <button class="btn btn-success" type="submit">
                                                                                                        save
                                                                                                    </button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-outline-info btn-sm">
                                                                        <a href="{{route('user.edit', ['id'=>$customer->id])}}">Edit</a>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            @php
                                                            $i++;
                                                            @endphp
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                                                                     
                            <!-- Hoverable rows end -->
                    
                            {{ $customers->links() }}
                            
                         
                
            </div>          
        </div>
    </div>

    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = 'New message to ' + recipient
            modalBodyInput.value = recipient
        })
    </script>
    
</body>

</html>
@endsection