@extends('employers.layouts.app')

@section('content')

<h1 class="mt-4">{{ $job->title }} Applicants</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('employer.jobList') }}">Jobs</a></li>
    <li class="breadcrumb-item active">{{ $job->title }} Applicants</li>
</ol>
<x-messages.success-message/>
<x-messages.error-message/>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        List of Applicants
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Application #</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobApplications as $jobApplication)
                        <tr>
                            <td>{{ $jobApplication->id }}</td>
                            <td>{{ $jobApplication->jobSeeker->name }}</td>
                            <td>{{ $jobApplication->jobSeeker->email }}</td>
                            <td>
                                @switch($jobApplication->status)
                                    @case('accepted')
                                        <span class="badge bg-success">{{ ucfirst($jobApplication->status) }}</span>
                                        @break
                                    @case('scheduled_for_interview')
                                        <span class="badge bg-success">Scheduled for Interview</span>
                                        @break
                                    @case('rejected')
                                        <span class="badge bg-danger">{{ ucfirst($jobApplication->status) }}</span>
                                        @break
                                    @case('canceled')
                                        <span class="badge bg-danger">{{ ucfirst($jobApplication->status) }}</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">{{ ucfirst($jobApplication->status) }}</span>
                                @endswitch
                            </td>
                            <td>
                                    <a href="{{ route('applications.show', $jobApplication->id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> View</a>                                     
                                    @if($jobApplication->status == "pending")
                                        <button type="button" class="btn btn-success btn-sm modal-trigger-button" data-bs-toggle="modal" data-bs-target="#popupModalAcceptApplication{{ $jobApplication->id }}"><i class="fas fa-check"></i> Accept</button>
                                        <button type="button" class="btn btn-primary btn-sm modal-trigger-button" data-bs-toggle="modal" data-bs-target="#popupModalScheduleForInterviewApplication{{ $jobApplication->id }}"><i class="fas fa-clock"></i> Schedule for Interview</button>
                                        <button type="button" class="btn btn-danger btn-sm modal-trigger-button" data-bs-toggle="modal" data-bs-target="#popupModalRejectApplication{{ $jobApplication->id }}"><i class="fas fa-times"></i> Reject</button>
                                        <x-confirmation-modal modal-id="popupModalAcceptApplication{{ $jobApplication->id }}" title="Confirm Application Action" message="Are you sure you want to accept {{ $jobApplication->jobSeeker->name }} application?" confirm-text="Yes, Accept">
                                            <form action="{{ route('applications.update', [$jobApplication->id, 'type' =>  'accept']) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        </x-confirmation-modal>
                                        <x-confirmation-modal modal-id="popupModalScheduleForInterviewApplication{{ $jobApplication->id }}" title="Confirm Application Action" message="Are you sure you want to schedule for interview {{ $jobApplication->jobSeeker->name }}?" confirm-text="Yes, Schedule for Interview">
                                            <form action="{{ route('applications.update', [$jobApplication->id, 'type' =>  'schedule_for_interview']) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="message" class="form-label mt-3 fw-bold">Message</label>
                                                    <textarea class="form-control" rows="10" name="message" id="message"></textarea>
                                                  </div>
                                            </form>
                                        </x-confirmation-modal>
                                        <x-confirmation-modal modal-id="popupModalRejectApplication{{ $jobApplication->id }}" title="Confirm Application Action" message="Are you sure you want to reject {{ $jobApplication->jobSeeker->name }} application?" confirm-text="Yes, Reject">
                                            <form action="{{ route('applications.update', [$jobApplication->id, 'type' =>  'reject']) }}" method="POST" class="d-inline mt-5">
                                                @csrf
                                                @method('PUT')
                                                {{-- <div class="mb-3 mt-3">
                                                  <label for="message" class="form-label">Message</label>
                                                  <textarea class="form-control" rows="8" name="message"></textarea>
                                                </div> --}}
                                            </form>
                                        </x-confirmation-modal>
                                    @endif
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
@push('pages-script')
<script>
$(document).ready(function () {
    $('.data-table').DataTable();
    
    $(document).on('show.bs.modal', '.confirmation-modal', function () {
        $(this).find('.modal-confirmation-button').on('click', function () {
            const form = $(this).closest('.confirmation-modal').find('form');
            console.log(form);
            form.submit();
        });
    });
});
</script>
@endpush
