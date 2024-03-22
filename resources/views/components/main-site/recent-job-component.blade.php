<section class="ftco-section bg-light" id="recentJobs">
    <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section text-center ftco-animate">
    <span class="subheading">Recently Added Jobs</span>
    <h2 class="mb-4"><span>Recent</span> Jobs</h2>
    </div>
    </div>
    <div class="row">

        
    @foreach ($recentJobs as $recentJob)
        <div class="col-md-12 ftco-animate">
            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                <div class="mb-4 mb-md-0 mr-5">
                    <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3">{{ $recentJob->title }}</h2>
                        <div class="badge-wrap">
                            @switch($recentJob->job_type)
                                @case('part-time')
                                    <span class="badge bg-primary text-white py-2 px-3">Part-time</span>
                                    @break
                                @case('full-time')
                                    <span class="badge bg-warning text-white py-2 px-3">Full-time</span>
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
                                    <span class="badge bg-info text-white py-2 px-3">{{ $recentJob->job_type }}</span>
                                    @break    
                            @endswitch
                        </div>
                    </div>
                    <div class="job-post-item-body">
                        <div class="mr-3"><i class="fas fa-layer-group text-success"></i> <a href="#">{{ $recentJob->employer->employer ? $recentJob->employer->employer->company_name : NULL }}</a></div>
                        <div class="mr-3"><i class="fa fa-map-marker-alt text-success mr-1"></i><span>{{ $recentJob->location }}</span></div>
                        <div>
                            <i class="far fa-money-bill-alt text-success mr-1"></i><span> &#8369; {{ number_format($recentJob->salary, 2) }}</span>
                        </div>
                        <br>
                        @foreach($recentJob->categories as $category) 
                        <span class="badge bg-light py-2 px-3" style="font-size: 10px;">{{ $category->name }}</span>
                        @endforeach
                    </div>
    
                </div>
                <div class="ml-auto d-flex">
                    <small class="d-flex align-items-center mr-1 {{ $recentJob->deadline->isToday() || $recentJob->deadline->isPast() ? 'text-danger' : '' }}"><i class="far fa-calendar-alt text-primary me-2 mr-1"></i>Date Line: {{ $recentJob->deadline->format('d M, Y') }}</small>
                    {{-- <a href="{{ route('job-single',$job->id) }}" class="btn btn-primary py-2 mr-1">Apply Job</a> --}}
                    <a href="{{ route('job-single', [$recentJob->id, '#jobDetails']) }}" class="btn btn-primary py-2 mr-1">Job Details</a>

                    {{-- <a href="#" class="btn btn-danger rounded-circle btn-favorite d-flex align-items-center">
                    <span class="icon-heart"></span>
                    </a> --}}
                </div>
            </div>
        </div>
    @endforeach



   
    </div>
    
    <div class="row mt-5">
        <div class="col text-center">
            <div class="block-27">
                {{ $recentJobs->links() }}
                {{-- <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul> --}}
            </div>
        </div>
    </div>

    </div>
</section>