<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="{{asset('css/modifiedstyles.css')}}" rel="stylesheet">
    <title>Start NG</title>

    <style>
        .body-banner {
            background-image: url('https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570926364/startng/Group_415_yteas3.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        
        .checked {
            color: orange;
        }
        
        .video {
            background-color: #44CF6C;
        }
        
        .help {
            background-image: url('https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570930464/startng/Group_418_ngwxfa.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>
</head>

<body>

@include('inc.new_nav');
    <div class="container-fluid body-banner pt-5 pb-5">
        <div class="col-md-6 offset-md-2">
            <h4 class="pt-5 mt-5 pb-4" style="color: #fff; font-style: normal; font-weight: 600; font-size: 35px; line-height: 27px;">Up Your Tech Game Online <br> or Onsite</h4>
            <p class="pb-3" style="color: #fff; font-style: normal; font-weight: 400; font-size: 16px; line-height: 27px;">
                The HNG internship is a 3-month remote internship designed to <br> find and develop the most talented software developers
            </p>
            <a href="{{route('register')}}" class="btn btn-success pl-5 pr-5 mb-4">Start Learning</a>
        </div>
    </div>

    <div class="container mt-2 mb-2">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4 class="mb-4 mt-3">Begin Your Journey to Self Development</h4>
                <p>The HNG internship is a 3-month remote internship designed <br> to find and develop the most talented software developers.<br> Everyone is welcome to participate (there is no entrance exam).<br> Anyone can log into the internship using
                    their laptop. Each week, we give tasks. </p>
                <form action="{{route('course.search')}}" method="post" >
                    @csrf
                    <input type="text" name="course" class="form-control col-md-10 mb-3" placeholder="Type in your preferred course">
                    <button type="submit" class="btn btn-success pl-5 pr-5 mb-3">  Find A Course</button>

                </form>
            </div>
            <div class="col-md-6 mb-3">
                <img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570926879/startng/Group_144_qgkkfx.png" class="img-fluid">
            </div>
        </div>
    </div>
@php
        $counter=0; @endphp
    <div class="container mt-5">
        <h4 class="text-center" style="color: #3A0842;">Explore Our Courses</h4>
        <hr>
        <div class="row">
            @foreach($courses as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top"
                             src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570927379/startng/Rectangle_44_w9fioh.png"
                             alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">{{$item->title}}</h4>
                            <p>{{$item->description}}</p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked mb-3"></span> <br>
                            @if(Auth::guest())
                                <a href="{{route('register')}}" class="btn btn-primary pr-3 pl-3 pt-1 pb-1"
                                   style="background-color: #9A75A0; border: thin solid #9A75A0;">Register</a>
                            @endif
                            @if(!Auth::guest())
                                <a href="{{route('register.courses',$item->id)}}" class="btn btn-primary pr-3 pl-3 pt-1 pb-1"
                                   style="background-color: #9A75A0; border: thin solid #9A75A0;">Register</a>
                            @endif
                            <a href="{{route('course.show', $item->id)}}" class="btn btn-primary pr-3 pl-3 pt-1 pb-1"
                               style="background-color: #9A75A0; border: thin solid #FFE797;">Details</a>
                        </div>
                    </div>
                </div>
                @if($counter%3==0) <br>   @endif

                @php
                    $counter+=1;
                @endphp

            @endforeach


        </div>

    </div>

    <div class="container-fluid video col-lg-12">
        <div class="row align-items-center">
            <div class="col-md-6 pb-3" style="color: #fff;">
                <div class="col-md-10 col-lg-10 offset-md-1">
                    <h4 class="pb-3" style="font-weight:bold; font-size: 24px;">The beginning of your career <br> starts here. With us.
                    </h4>
                    <p class="" style="font-weight:bold;">- Intensive learning sessions</p>
                    <p class="">The HNG internship is a 3-month remote <br> internship designed ---to find and <br> develop the most talented software developers. </p>
                    <p class="" style="font-weight:bold;">- Intensive learning sessions</p>
                    <p class="">The HNG internship is a 3-month remote <br> internship designed ---to find and <br> develop the most talented software developers. </p>
                    <a href="" class="" style="color: #fff; font-weight: bold;">Learn more >></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570929621/startng/Group_417_rx40it.png" class="img-fluid w-100">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img class="img-fluid" src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570930231/startng/Group_236_dr5bq8.png">
            </div>
            <div class="col-md-6">
                <h4 class="pb-3">Take Your First Steps in Achieving Your Dreams</h4>
                <p class="pb-4">The HNG internship is a 3-month remote internship <br> designed to find and develop the most talented
                    <br> software developers. Everyone is welcome to participate <br> (there is no entrance exam). </p>
                <a href="{{asset('register')}}" class="btn btn-success pl-5 pr-5">Start Learning</a>
            </div>
        </div>
    </div>

    <div class="container-fluid help mt-5 pt-5 pb-5">
        <div class="col-md-6 offset-md-3 text-center pt-5" style="color: #fff;">
            <h4 class="pb-3">Need Professional Help?</h4>
            <p class="pb-4">After 3 months of training and projects, our graduates <br> are ready to take on full-time or remote jobs at your <br> company.
            </p>
            <a href="{{asset('hire')}}" class="btn btn-success pl-5 pr-5">Hire
                a Graduate
            </a>
        </div>
    </div>

    <div class="container-fluid pt-5 pb-5" style="background-color: #fff;">
        <div class="col-md-10 offset-md-1">
            <section class="">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h4 class="font-weight-bold">What people have to say about us</h4>
        </div>
        <div class="mb-5 card border-0 rounded rounded-lg shadow bg-white">
            <div class="card-body mx-md-5 my-2">
                <p class="lead text-muted">The HNG internship is a 3-month remote internship designed to find and develop the most talented software developers. Everyone is welcome to participate (there is no entrance exam). Anyone can log into the internship using their laptop. Each week, we give tasks. </p>
                <div class="d-flex justify-content-start align-items-left mt-5">
                    <img src="https://lancer-app.000webhostapp.com/startng/images/landing/dennis.png" class="img img-responsive rounded-circle" width="100" height="100">
                    <div class="ml-4">
                        <p class="text-warning pb-2 my-0" >
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </p>
                        <h6>Dennis Lagbaja</h6>
                        <small class="text-muted"><em>Completed the Front End Developer Class</em></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-0 rounded rounded-lg shadow bg-white">
            <div class="card-body mx-md-5 my-2">
                <p class="lead text-muted">The HNG internship is a 3-month remote internship designed to find and develop the most talented software developers. Everyone is welcome to participate (there is no entrance exam). Anyone can log into the internship using their laptop. Each week, we give tasks. </p>
                <div class="d-flex justify-content-start align-items-left mt-5">
                    <img src="https://res.cloudinary.com/message/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_red,b_rgb:262c35/v1566597822/personal%20and%20school%20images/RAW_9_i7w8k2.jpg" class="img img-responsive rounded-circle" width="100" height="100">
                    <div class="ml-4">
                        <p class="text-warning pb-2 my-0" >
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </p>
                        <h6>Akunna Message</h6>
                        <small class="text-muted"><em>Completed the Front End Developer Class</em></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
        <div class="col-md-6 offset-md-3 text-center pt-5 pb-5">
            <h4>Online or Offline, We Are Here For You</h4>
            <p>The HNG internship is a 3-month remote internship designed to find and develop the most talented software developers.
            </p>
            <a href="{{asset('register')}}" class="btn btn-success pl-5 pr-5">Start
                Learning</a>
        </div>
    </div>

    <div class="container-fluid pt-5 pb-5" style="background-color: rgba(42, 43, 42, 0.05);">
        <div class="container pt-5 pb-5">
            <div class="row align-items-center">
                <div class="col-md-8 pb-5">
                    <h4 style="font-weight: bold; font-size: 40px;">Subscribe to our Newsletter</h4>
                    <p style="font-size: 20px;">Stay Updated with our latest news, discount and promotions
                    </p>
                    {!! Form::open(['action' => 'SubscriptionsController@store', 'method' => 'POST', 'class' => 'form-inline']) !!}
                    {{ csrf_field() }}
                    {{Form::email('email', '', ['class' => 'form-control col-md-8', 'id' => 'email', 'placeholder' => 'Enter your email address'])}}
                    {{Form::submit('Subscribe', ['class' => 'btn btn-success ml-1 pl-5 pr-5'])}}
                    {!! form::close() !!}
                </div>
                <div class="col-md-4">
                    <img class="img-fluid" src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570931071/startng/newsletter_1_h3frhq.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

@include('../inc.new_footer')

    <!-- End of Footer -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
