<section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">We have {{ $results->count() }} {{ Str::plural('job', $results->count()) }} for you <br>Click apply job to view details</span>
          <h2 class="mb-4">
            <span>Result</span> Jobs
          </h2>
        </div>
      </div>

      <div class="row">

        
        @foreach ($results as $jobResult)
            <div class="col-md-12 ftco-animate">
                <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                    <div class="mb-4 mb-md-0 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h3">{{ $jobResult->title }}</h2>
                            <div class="badge-wrap">
                                @switch($jobResult->job_type)
                                    @case('part-time')
                                        <span class="badge bg-primary text-white py-2 px-3">Part-time</span>
                                        @break
                                    @case('full-time')
                                        <span class="badge bg-primary text-white py-2 px-3">Full-time</span>
                                        @break
                                    @case('freelance')
                                        <span class="badge bg-info text-white py-2 px-3">Freelance</span>
                                        @break
                                    @case('internship')
                                        <span class="badge bg-secondary text-white py-2 px-3">Internship</span>
                                        @break
                                    @case('temporary')
                                        <span class="badge bg-danger text-white py-2 px-3">Temporary</span>
                                        @break
                                    @default
                                    <span class="badge bg-info text-white py-2 px-3">{{ $jobResult->job_type }}</span>
                                    @break     
                                @endswitch
                            </div>
                        </div>
                        <div class="job-post-item-body">
                            <div class="mr-3"><i class="fas fa-layer-group text-success"></i> <a href="#">{{ $jobResult->employer->employer ? $jobResult->employer->employer->company_name : NULL }}</a></div>
                            <div class="mr-3"><i class="fa fa-map-marker-alt text-success mr-1"></i><span>{{ $jobResult->location }}</span></div>
                            <div>
                                <i class="far fa-money-bill-alt text-success mr-1"></i><span> &#8369; {{ number_format($jobResult->salary, 2) }}</span>
                            </div> 
                            <br>
                            @foreach($$jobResult->categories as $category) 
                        <span class="badge bg-light py-2 px-3" style="font-size: 10px;">{{ $category->name }}</span>
                        @endforeach 
                        </div>
        
                    </div>
                    <div class="ml-auto d-flex">
                        <small class="d-flex align-items-center mr-1 {{ $jobResult->deadline->isToday() || $jobResult->deadline->isPast() ? 'text-danger' : '' }}"><i class="far fa-calendar-alt text-primary me-2 mr-1"></i>Date Line: {{ $jobResult->deadline->format('d M, Y') }}</small>
                        {{-- <a href="{{ route('job-single',$job->id) }}" class="btn btn-primary py-2 mr-1">Apply Job</a> --}}
                        <a href="{{ route('job-single', [$jobResult->id, '#jobDetails']) }}" class="btn btn-primary py-2 mr-1">Job Details</a>
    
                        {{-- <a href="#" class="btn btn-danger rounded-circle btn-favorite d-flex align-items-center">
                        <span class="icon-heart"></span>
                        </a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    
    
    
       
        </div>
    </div>
</section>