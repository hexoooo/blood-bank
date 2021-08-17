@extends('front/front_layout')

@section('active')
<div class="collapse navbar-collapse" id="navbarNav">
 <ul class="navbar-nav">
     <li class="nav-item active">
         <a class="nav-link" href="/front-home">home </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/front-about-us">about us  </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="#">articles</a>
     </li>
     <li class="nav-item active">
         <a class="nav-link" href="/donation-requests">donation requests <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/front-about-us">who are us</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/contact-us">contact us </a>
     </li>
 </ul>
 
 <!--not a member-->
 <div class="accounts">
     <a href="/signin-account" class="signin">sign in</a>
     <a href="/create-account" class="create">create new account</a>
 </div>
 
 <!--I'm a member

 <a href="#" class="donate">
     <img src="imgs/transfusion.svg">
     <p>طلب تبرع</p>
 </a>

 -->
 
</div>
@endsection

@section('content')
    
        <!--inside-article-->
        <div class="all-requests">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-ltr.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Donation requests</li>
                        </ol>
                    </nav>
                </div>
            
                <!--requests-->
                <div class="requests">
                    <div class="head-text">
                        <h2>Donation requests</h2>
                    </div>
                    <div class="content">
                        <form class="row filter" method="get" action="/donationRequests">
                            <div class="col-md-5 blood">
                                <div class="form-group">
                                    <div class="inside-select">
                                        <select name='bloodType' class="form-control" id="exampleFormControlSelect1">
                                            <option selected disabled>Choose blood type</option>
                                           @foreach ($bloodTypes as $b)
                                           <option >{{$b->name}}</option>
                                           @endforeach
                                            
                                           
                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 city">
                                <div class="form-group">
                                    <div class="inside-select">
                                        <select name='city' class="form-control" id="exampleFormControlSelect1">
                                            <option selected disabled>Choose city</option>
                                            @foreach ($cities as $city)
                                            <option >{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <div class="patients">
                            @foreach ($donationRequests as $request)                       
                            <div class="details">
                                <div class="blood-type">
                                    <h2 dir="ltr">{{$request->BloodType()->first()->name}}</h2>
                                </div>
                                <ul>
                                    <li><span>Patient name:</span> {{$request->name}}</li>
                                    <li><span>Hospital:</span> {{$request->hospital_address}}</li>
                                    <li><span>City:</span>{{$request->city()->first()->name}}</li>
                                </ul>
                                <a href="/donationRequest/{{$request->id}}">Details</a>
                            </div>
                            @endforeach
                        <div class="more">
                            <a href="donation-requests-ltr.html">More</a>
                        </div>
                        <div class="pages">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        

        @endsection