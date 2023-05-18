@extends('employers.layouts.app')

@section('content')

<h1 class="mt-4">{{ $job->title }} Applicants</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('employer.jobList') }}">Jobs</a></li>
    <li class="breadcrumb-item active">{{ $job->title }} Applicants</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        List of Applicants
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applicants as $applicant)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $applicant->jobSeeker->name }}</td>
                            <td>{{ $applicant->jobSeeker->email }}</td>
                            <td>{{ ucfirst($applicant->status) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('job.applicant.show', [$job->id, $applicant->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
                                    <form action="{{ route('job.applicant.update', [$job->id, $applicant->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Accept</button>
                                    </form>
                                    <form action="{{ route('job.applicant.update', [$job->id, $applicant->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No applicants found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
