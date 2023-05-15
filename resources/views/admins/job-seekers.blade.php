@extends('admins.layouts.app')

@section('content')

<h1 class="mt-4">Job Seekers</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Job Seeker</li>
</ol>
<div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Job Seeker List
        </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
        
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobSeekerModal">
                <i class="fa fa-plus"></i> {{ __('Add Job Seeker') }}
            </button> --}}
            
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($seekers  as $seeker)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $seeker->name }}</td>
                            <td style="text-align: center;">
                                <div class="btn-group">
                                    <a href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> {{ __('View') }}</a>
                                    <button type="button" class="btn btn-danger btn-sm deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $seeker->id }}" data-name="{{ $seeker->name }}"><i class="fas fa-trash"></i> {{ __('Delete') }}</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{ __('No job seekers found.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>




        <!-- Modal to confirm job deletion -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">{{ __('Confirm Delete') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('Are you sure you want to delete job seeker: ') }}<strong><span id="seekerName"></span></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // Handle delete button click
            $('.deleteBtn').on('click', function() {
                // console.log('dal');
                var seekerId = $(this).data('id');
                var seekerName = $(this).data('name');
                $('#deleteForm').attr('action', '/category/' + seekerId);
                $('#seekerName').text(seekerName);
            });
        </script>


@endsection


