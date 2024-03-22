@extends('landing-layouts.master')

@section('content')

<x-main-site.hero-component total-jobs="{{ $totalJobs }}" job-title="{{ isset($jobTitle) ? $jobTitle : '' }}" job-type="{{ isset($jobType) ? $jobType : '' }}" location="{{ isset($location) ? $location : '' }}" />

<div class="ftco-section bg-light" id="jobDetails">
  <div class="container">
   <div class="row">
          <div class="col-md-8 col-lg-8 mb-5">
            <div class="p-5 bg-white">
              <div class="mb-4 mb-md-5 mr-5">
                <div class="job-post-item-header d-flex align-items-center">

                  <h2 class="mr-3 text-black h4">{{ $job->title }}</h2>
                  <div class="badge-wrap">
                    @if ($job->job_type == 'part-time') <span class="bg-primary text-white badge py-2 px-3">Part-time</span> 
                    @elseif ($job->job_type == 'full-time') <span class="bg-warning text-white badge py-2 px-3">Full-time</span> 
                    @elseif ($job->job_type == 'freelance') <span class="bg-info text-white badge py-2 px-3">Freelance</span> 
                    @elseif ($job->job_type == 'internship') <span class="bg-secondary text-white badge py-2 px-3">Internship</span> 
                    @elseif ($job->job_type == 'temporary') <span class="bg-danger text-white badge py-2 px-3">Temporary</span>
                    @else  <span class="bg-info text-white badge py-2 px-3">{{ $job->job_type }}</span> 
                    @endif 
                  </div>
                </div>
                <div class="job-post-item-body">
                  <div class="mr-3">
                    <i class="fas fa-layer-group text-success"></i>
                    <a href="#">{{ $job->employer->employer ? $job->employer->employer->company_name : NULL }}</a>
                  </div>
                  <div class="mr-3">
                    <i class="fa fa-map-marker-alt text-success mr-1"></i>
                    <span>{{ $job->location }}</span>
                  </div>
                  <div class="mr-3">
                    <i class="far fa-money-bill-alt text-success mr-1"></i><span> &#8369; {{ number_format($job->salary, 2) }}</span>
                  </div>
                  <div class="{{ $job->deadline->isToday() || $job->deadline->isPast() ? 'text-danger' : '' }}">
                        <i class="far fa-calendar-alt text-primary me-2 mr-1"></i>Date Line: {{ $job->deadline->format('d M, Y') }}
                  </div>
                  <div align="right">
                  @foreach($job->categories as $category) 
                        <span class="badge bg-light py-2 px-3" style="font-size: 10px;">{{ $category->name }}</span>
                        @endforeach
                  </div>      
                </div>
              </div>
              <div class="mb-1">
                <h5>Job description</h5>
                <p>{{ $job->description }}</p>
              </div>
              <hr>
              <div class="mb-1">
                <h5>Job Type</h5>
                <p>{{ $job->job_type }}</p>
              </div>
              <hr>
              <div class="mb-1">
              @php 
                        $educationString = explode('*', $job->education);
                        $education = "";
                        foreach($educationString as $educ){
                           $education .= $educ.", ";
                        }
                        $education = rtrim($education, ", ");
                    @endphp
                <h5>Education</h5>
                <p>{{ $education }}</p>
              </div>
              <hr>
              <div class="mb-1">
              @switch($job->yrOfexp)
                                    @case('0')
                                        @php $exp = "None"; @endphp
                                        @break
                                    @case('1')
                                        @php $exp = "1-6 mos"; @endphp
                                        @break
                                    @case('2')
                                        @php $exp = "7-12 mos"; @endphp
                                        @break
                                    @case('3')
                                        @php $exp = "1-2 yrs"; @endphp
                                        @break
                                    @case('4')
                                        @php $exp = "2 yrs and above"; @endphp
                                        @break    
                                @endswitch
                <h5>Years of Relevant Experience  </h5>
                <p>{{ $exp }}</p>
              </div>
              <hr>
              <div class="mb-1">
              @switch($job->eligibility)
                                    @case('0')
                                        @php $el = "None Required"; @endphp
                                        @break
                                    @case('1')
                                        @php $el = "CS Sub-professional"; @endphp
                                        @break
                                    @case('2')
                                        @php $el = "CS Professional"; @endphp
                                        @break
                                    @case('3')
                                        @php $el = "Licensed Professional"; @endphp
                                        @break  
                                @endswitch
                <h5>Eligibility  </h5>
                <p>{{ $el }}</p>
              </div>
              <hr>
              <div class="mb-1">
                <h5>Requirements</h5>
                <p>{{ $job->requirements }}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="p-4 mb-3 bg-white">
              <p>
                <a href="{{ route('job-apply', [$job->id, '#jobApplication']) }}" class="btn btn-primary btn-block py-2 px-4" style="width:100%;">Apply</a>
              </p>
            </div>
          </div>
        </div>
  </div>
</div>
@endsection