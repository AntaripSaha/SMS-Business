@extends('layouts.layout')


@section('content')
<style>
    #search{
        width: 36%; 
        margin-bottom:20px
    }
    @media only screen and (max-width: 500px) {
    #search {
        width: 100%; 
        margin-bottom:20px
  }
}
#id{
    margin: 2px;
}

#s_button{
    position: absolute;
    left: 371px;
    top: 2px;
    padding: 7px;  
  }
@media only screen and (max-width: 500px) {
    #s_button {
    position: inherit;
    left: 264px;
    top: 64px;
  }
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
                                                        <form action="{{route('campaign.search')}}">
                                                            @csrf
                                                            <input type="text" class="form-control" name="name" id="search">
                                                            <button type="submit" class="btn btn-outline-info btn-sm" id="s_button">
                                                                Search
                                                            </button>
                                                        </form>

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