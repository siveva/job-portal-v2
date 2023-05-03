@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('job.create') }}" class="btn btn-primary">{{ __('Post a Job') }}</a>
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
                                                <a href="{{ route('job.edit', $job->id) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                                <form action="{{ route('job.destroy', $job->id) }}" method="post" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">{{ __('No jobs found.') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
