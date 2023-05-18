@extends('jobseekers.layouts.app')

@section('content')

<h1 class="mt-4">Applied Jobs</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Applied Jobs</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Applied Jobs
    </div>
    <div class="card-body">

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($appliedJobs->isEmpty())
        <p>No applied jobs found.</p>
        @else
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Applied Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appliedJobs as $appliedJob)
                    <tr>
                        <td>{{ $appliedJob->job->title }}</td>
                        <td>{{ $appliedJob->job->company->name }}</td>
                        <td>{{ $appliedJob->created_at->format('M d, Y') }}</td>
                        <td>{{ $appliedJob->status }}</td>
                        <td>
                            <a href="{{ route('jobseeker.appliedJobs.show', $appliedJob) }}" class="btn btn-primary btn-sm">View</a>
                            <form action="{{ route('jobseeker.appliedJobs.destroy', $appliedJob) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this applied job?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>
</div>

@endsection
