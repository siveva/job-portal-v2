@extends('employers.layouts.app')

@section('content')

<h1 class="mt-4">Company Overview</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Company Overview</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Company Information
    </div>
    <div class="card-body">
    
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
     
        <form method="POST" action="{{ route('employer.overview.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row mb-3">
                <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                <div class="col-md-6">
                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ $employer->company_name }}" required autocomplete="company_name" autofocus>

                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="company_description" class="col-md-4 col-form-label text-md-right">{{ __('Company Description') }}</label>

                <div class="col-md-6">
                    <textarea id="company_description" class="form-control @error('company_description') is-invalid @enderror" name="company_description" required>{{ $employer->company_description }}</textarea>

                    @error('company_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="company_logo" class="col-md-4 col-form-label text-md-right">{{ __('Company Logo') }}</label>

                <div class="col-md-6">
                    <input id="company_logo" type="file" class="form-control-file @error('company_logo') is-invalid @enderror" name="company_logo">

                    @error('company_logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>

      
    </div>
</div>

@endsection

