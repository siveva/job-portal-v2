@extends('landing-layouts.master')
@section('content')
<x-main-site.hero-component total-jobs="{{ $totalJobs }}" job-title="{{ isset($jobTitle) ? $jobTitle : '' }}" job-type="{{ isset($jobType) ? $jobType : '' }}" location="{{ isset($location) ? $location : '' }}" />

<x-main-site.search-result-component :results="$jobResults" />

<x-main-site.recent-job-component :recentJobs="$recentJobs" />
@endsection