@extends('landing-layouts.master')

@section('content')


<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
    <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
      <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
        <span class="mr-3">
          <a href="/">Home <i class="ion-ios-arrow-forward"></i>
          </a>
        </span>
        <span>Job Details</span>
      </p>
      <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Job Details</h1>
    </div>
  </div>
</div>
</div>
<div class="ftco-section bg-light">
  <div class="container">
   <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
            <div class="p-5 bg-white">
              <div class="mb-4 mb-md-5 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
    
                  <h2 class="mr-3 text-black h4">{{ $job->title }}</h2>
                  <div class="badge-wrap">
                    @if ($job->job_type == 'part-time') <span class="bg-primary text-white badge py-2 px-3">Part-time</span> @elseif ($job->job_type == 'full-time') <span class="bg-warning text-white badge py-2 px-3">Full-time</span> @elseif ($job->job_type == 'freelance') <span class="bg-info text-white badge py-2 px-3">Freelance</span> @elseif ($job->job_type == 'internship') <span class="bg-secondary text-white badge py-2 px-3">Internship</span> @elseif ($job->job_type == 'temporary') <span class="bg-danger text-white badge py-2 px-3">Temporary</span> @endif 
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3">
                    <i class="fas fa-layer-group text-success"></i>
                    <a href="#">{{ $job->employer->employer ? $job->employer->employer->company_name : NULL }}</a>
                  </div>
                  <div class="mr-3">
                    <i class="fa fa-map-marker-alt text-success mr-1"></i>
                    <span>{{ $job->location }}</span>
                  </div>
                  <div class="mr-3">
                    <i class="far fa-money-bill-alt text-success mr-1"></i>
                    <span>$123 - $456</span>
                  </div>
                  <div>
                        <i class="far fa-calendar-alt text-primary me-2 mr-1"></i>Date Line: {{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <h4 class="mb-3">Job description</h4>
                <p>{{ $job->description }}</p>
                <h4 class="mb-3">Responsibility</h4>
                <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                </ul>
                <h4 class="mb-3">Qualifications</h4>
                <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                    <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                </ul>
            </div>

            <div class="">
                <h4 class="mb-4">Apply For The Job</h4>
                <form>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" placeholder="Portfolio Website">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="file" class="form-control bg-white">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                        </div>
                        {{-- <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                        </div> --}}
                    </div>
                </form>
            </div>
           
              <p class="mt-5">
                <a href="#" class="btn btn-primary  py-2 px-4">Apply Now</a>
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
              <p>
                <a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a>
              </p>
            </div>
          </div>
        </div>
  </div>
</div>

@endsection