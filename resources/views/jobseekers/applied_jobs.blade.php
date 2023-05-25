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
            <table class="table table-condensed data-table" id="dataTable" width="100%" cellspacing="0">
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
                        <td>{{ $appliedJob->jobListing->title }}</td>
                        <td>{{ $appliedJob->jobListing->employer->employer->company_name }}</td>
                        <td>{{ $appliedJob->created_at->format('M d, Y') }}</td>
                        <td class="text-center">
                            @switch($appliedJob->status)
                                @case('accepted')
                                    <span class="badge bg-success">{{ Str::ucfirst($appliedJob->status) }}</span>
                                    @break
                                @case('rejected')
                                    <span class="badge bg-danger">{{ Str::ucfirst($appliedJob->status) }}</span>
                                    @break
                                @case('canceled')
                                    <span class="badge bg-danger">{{ Str::ucfirst($appliedJob->status) }}</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary">{{ Str::ucfirst($appliedJob->status) }}</span>
                                @break
                            @endswitch
                        </td>
                        <td>
                            {{-- <a href="#" class="btn btn-primary btn-sm">View</a> --}}
                            <form action="{{ route('jobseeker.cancel.application', $appliedJob->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm @if($appliedJob->status === "accepted" || $appliedJob->status === "canceled") disabled @endif" onclick="return confirm('Are you sure you want to cancel this application?')">Cancel</button>
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
@push('pages-script')
    <script>
    $(document).ready(function () {
        $('.data-table').DataTable();
    });
    </script>
@endpush
