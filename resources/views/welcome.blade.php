@extends('landing-layouts.master')
@section('content')
    <x-main-site.hero-component total-jobs="{{ $totalJobs }}" job-title="{{ isset($jobTitle) ? $jobTitle : '' }}" job-type="{{ isset($jobType) ? $jobType : '' }}" location="{{ isset($location) ? $location : '' }}" />

    {{-- <x-main-site.job-feature-component /> --}}
    
    {{-- <x-main-site.job-category-component :categories="$categories" /> --}}
        
    <x-main-site.recent-job-component :recentJobs="$recentJobs" />
@endsection