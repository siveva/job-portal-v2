@extends('employers.layouts.app')
@prepend('pages-css')
    <style>
        /* body {
            background-color: #353135;
        } */
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
@endprepend
@section('content')

<h1 class="mt-4">Application for {{ $application->jobListing->title }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('employer.jobList') }}">Jobs</a></li>
    <li class="breadcrumb-item active">Application for {{ $application->jobListing->title }}</li>
</ol>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="p-3">
                @if($application->status === "pending")
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#popupModalRejectApplication">Reject Application</button>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#popupModalAcceptApplication">Accept Application</button> 
                @else
                    @if($application->status === "accepted")
                        <h5><span class="badge rounded-pill bg-success">Application Status: {{ Str::ucfirst($application->status) }} <i class="fa fa-check" aria-hidden="true"></i></span></h5>   
                    @elseif($application->status === "canceled")
                        <h5><span class="badge rounded-pill bg-danger">Application Status: {{ Str::ucfirst($application->status) }} <i class="fa fa-times" aria-hidden="true"></i></span></h5> 
                    @else
                        <h5><span class="badge rounded-pill bg-danger">Application Status: {{ Str::ucfirst($application->status) }} <i class="fa fa-times" aria-hidden="true"></i></span></h5> 
                    @endif
                @endif            
                <x-confirmation-modal modal-id="popupModalAcceptApplication" title="Confirm Application Action" message="Are you sure you want to accept {{ $application->jobSeeker->name }} application?" confirm-text="Yes, Accept">
                    <form action="{{ route('applications.update', [$application->id, 'type' =>  'accept']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                    </form>
                </x-confirmation-modal>
                <x-confirmation-modal modal-id="popupModalRejectApplication" title="Confirm Application Action" message="Are you sure you want to reject {{ $application->jobSeeker->name }} application?" confirm-text="Yes, Reject">
                    <form action="{{ route('applications.update', [$application->id, 'type' =>  'reject']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        {{-- <div class="form-group">
                            <label>Remarks</label>
                            <textarea class="form-control" rows="10" name="message"></textarea>
                        </div> --}}
                    </form>
                </x-confirmation-modal>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ $application->jobSeeker->name }}</span><span class="text-black-50">{{ $application->jobSeeker->email }}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Firstname</label><input type="text" class="form-control" placeholder="first name" value="{{ $application->jobSeeker->jobSeeker->first_name }}" readonly></div>
                    <div class="col-md-6"><label class="labels">Lastname</label><input type="text" class="form-control" value="{{ $application->jobSeeker->jobSeeker->last_name }}" readonly placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{ $application->jobSeeker->jobSeeker->phone_number }}" readonly></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter phone number" value="{{ $application->jobSeeker->email }}" readonly></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address line 1" value="{{ $application->jobSeeker->jobSeeker->address }}" readonly></div>
                    {{-- <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div> --}}
                </div>
                {{-- <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div> --}}
                {{-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div> --}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Application</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <a href="{{ route('applications.download.resume', $application->id) }}" class="btn btn-primary btn-sm">Download Resume<i class="fa fa-download" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="10" cols="10" readonly>{{ $application->cover_letter }}</textarea>
                    </div>
                </div>
            </div>
            {{-- <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div> --}}
        </div>
    </div>
</div>
</div>
</div>
@endsection
@push('pages-script')
<script>
$(document).ready(function () {
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