@extends('layouts.layout')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                    <div class="sidebar-header">
                        <div class="d-flex justify-content-between">
                            <div class="logo">
                                <a href="index.html"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                            </div>
                            <div class="toggler">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Balance: {{ $customer->balance }} </li>

                        <li class="sidebar-item active ">
                            <a href="{{route('user.campaign')}}" class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>Campaign</span>
                            </a>
                        </li>            

                      
                        <li class="sidebar-item  ">
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

            @include('layouts/flash-msg')
            @yield('content')   
            
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Select Area</h3>
                            <p class="text-subtitle text-muted">Send SMS to Selected Area</p>
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
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <!-- Hoverable rows start -->
                            <section class="section">
                                <div class="row" id="table-hover-row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Campaign Information</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form action="{{route('sms.area')}}">
                                                        @csrf
                                                        <!-- table hover -->
                                                        <div>
                                                        
                                                            <table class="table table-hover mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Select</th>
                                                                        <th>Area</th>
                                                                        <th>Total Numbers</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                    $i=1;
                                                                    @endphp
                                                                    @foreach($database as $db)
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>
                                                                        <div class="card-body">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" id="select" name="id" value="{{$db->id}}" onclick="addRow();" required>{{$db->name}}
                                                                            </div>
                                                                        </div>
                                                                        </td>
                                                                        <td>{{$db->number}}</td>
                                                                    </tr>
                                                                    @php
                                                                    $i= $i+1;
                                                                    @endphp
                                                                    @endforeach
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        {{$database->links()}}

                                                        <button type="submit" class="btn btn-outline-success btn-sm"> 
                                                            Submit
                                                        </button>
                                                    </form>
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
                </section>
            </div>          
        </div>
    </div>
<!-- <script>
    var sl = 0
    function addRow(){
        sl++;
        var area = document.getElementById("select").value;

            var html = "<tr>"
            html +="<td>"+ sl +"</td>";
            html += "<td><input name='start'></td>";
            html += "<td><input name='end' ></td>";
            html += "</tr>"
        document.getElementById("tbid").insertRow().innerHTML = html;    
    }
</script> -->
@endsection