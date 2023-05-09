@extends('jobseekers.layouts.app')

@section('content')

<h1 class="mt-4">My Applications</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Applications</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('job.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> {{ __('Post a Job') }}
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('Job Title') }}</th>
                        <th>{{ __('Applications') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->applications_count }}</td>
                            <td>{{ $job->status }}</td>
                            <td>
                                {{-- <a href="{{ route('job.edit', $job->id) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                <form action="{{ route('job.destroy', $job->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{ __('No jobs found.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

      
    </div>
</div>



@endsection
