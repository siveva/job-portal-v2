<!DOCTYPE html>
<html lang="en">

<head>
<title>Surigao del Sur - Job Portal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/animate.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/owl.carousel.min.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/owl.theme.default.min.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/magnific-popup.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/aos.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/ionicons.min.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/jquery.timepicker.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/flaticon.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/icomoon.css">
<link rel="stylesheet" href="http://localhost/job-portal-app/public/css/style.css">-->

<link rel="stylesheet" href="{{ asset('/public/css/open-iconic-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/animate.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/aos.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/jquery.timepicker.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/flaticon.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/icomoon.css')}}">
<link rel="stylesheet" href="{{ asset('/public/css/style.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

{{-- <script nonce="31052385-3deb-461a-8b55-daace9380f7a">(function(w,d){!function(dk,dl,dm,dn){dk[dm]=dk[dm]||{};dk[dm].executed=[];dk.zaraz={deferred:[],listeners:[]};dk.zaraz.q=[];dk.zaraz._f=function(dp){return function(){var dq=Array.prototype.slice.call(arguments);dk.zaraz.q.push({m:dp,a:dq})}};for(const dr of["track","set","debug"])dk.zaraz[dr]=dk.zaraz._f(dr);dk.zaraz.init=()=>{var ds=dl.getElementsByTagName(dn)[0],dt=dl.createElement(dn),du=dl.getElementsByTagName("title")[0];du&&(dk[dm].t=dl.getElementsByTagName("title")[0].text);dk[dm].x=Math.random();dk[dm].w=dk.screen.width;dk[dm].h=dk.screen.height;dk[dm].j=dk.innerHeight;dk[dm].e=dk.innerWidth;dk[dm].l=dk.location.href;dk[dm].r=dl.referrer;dk[dm].k=dk.screen.colorDepth;dk[dm].n=dl.characterSet;dk[dm].o=(new Date).getTimezoneOffset();if(dk.dataLayer)for(const dy of Object.entries(Object.entries(dataLayer).reduce(((dz,dA)=>({...dz[1],...dA[1]})))))zaraz.set(dy[0],dy[1],{scope:"page"});dk[dm].q=[];for(;dk.zaraz.q.length;){const dB=dk.zaraz.q.shift();dk[dm].q.push(dB)}dt.defer=!0;for(const dC of[localStorage,sessionStorage])Object.keys(dC||{}).filter((dE=>dE.startsWith("_zaraz_"))).forEach((dD=>{try{dk[dm]["z_"+dD.slice(7)]=JSON.parse(dC.getItem(dD))}catch{dk[dm]["z_"+dD.slice(7)]=dC.getItem(dD)}}));dt.referrerPolicy="origin";dt.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(dk[dm])));ds.parentNode.insertBefore(dt,ds)};["complete","interactive"].includes(dl.readyState)?zaraz.init():dk.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script> --}}
</head>
<body>
 
    @include('landing-layouts.navbar')
    
    @yield('content')

    {{-- <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{ $totalJobs }}">0</strong>
                                    <span>Jobs</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{ $totalJobSeekerAndEmployer->jobseeker_count }}">0</strong>
                                    <span>Job Seekers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{ $totalJobSeekerAndEmployer->employer_count }}">0</strong>
                                    <span>Employer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- @include('landing-layouts.footer') --}}


<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<!--<script src="http://localhost/job-portal-app/public/js/jquery.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/popper.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/bootstrap.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/jquery.easing.1.3.js"></script>
<script src="http://localhost/job-portal-app/public/js/jquery.waypoints.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/jquery.stellar.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/owl.carousel.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/jquery.magnific-popup.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/aos.js"></script>
<script src="http://localhost/job-portal-app/public/js/jquery.animateNumber.min.js"></script>
<script src="http://localhost/job-portal-app/public/js/bootstrap-datepicker.js"></script>
<script src="http://localhost/job-portal-app/public/js/jquery.timepicker.min.html"></script>
<script src="http://localhost/job-portal-app/public/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
<script src="http://localhost/job-portal-app/public/js/google-map.js"></script>
<script src="http://localhost/job-portal-app/public/js/main.js"></script>-->

<script src="{{ asset('/public/js/jquery.min.js')}}"></script>
<script src="{{ asset('/public/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{ asset('/public/js/popper.min.js')}}"></script>
<script src="{{ asset('/public/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/public/js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('/public/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('/public/js/jquery.stellar.min.js')}}"></script>
<script src="{{ asset('/public/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('/public/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('/public/js/aos.js')}}"></script>
<script src="{{ asset('/public/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{ asset('/public/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('/public/js/jquery.timepicker.min.html')}}"></script>
<script src="{{ asset('/public/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
<script src="{{ asset('/public/js/google-map.js')}}"></script>
<script src="{{ asset('/public/js/main.js')}}"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7be7a37a3deb0eba","version":"2023.3.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

</html>