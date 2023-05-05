@extends('layouts.app')

@prepend('pages-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endprepend

@section('content')

<h1 class="mt-4">Post Job</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Create</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Input Job Information
    </div>
    <div class="card-body">
    
     
        <form method="POST" action="{{ route('job.store') }}">
            @csrf

            <div class="form-group row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                <div class="col-md-6">
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location">

                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                <div class="col-md-6">
                    <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="salary">

                    @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="job_type" class="col-md-4 col-form-label text-md-right">{{ __('Job Type') }}</label>

                <div class="col-md-6">
                    <select id="job_type" class="form-control @error('job_type') is-invalid @enderror" name="job_type" required autocomplete="job_type">
                        <option value="part-time">Part-time</option>
                        <option value="full-time">Full-time</option>
                        <option value="freelance">Freelance</option>
                        <option value="internship">Internship</option>
                        <option value="temporary">Temporary</option>
                    </select>
                    @error('job_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row mb-3">
                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
            
                <div class="col-md-6">
                    <select id="category" class="form-control @error('categories') is-invalid @enderror" name="categories[]" multiple required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categories')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            

            <div class="form-group row mb-3">
                <label for="requirements" class="col-md-4 col-form-label text-md-right">{{ __('Requirements') }}</label>

                <div class="col-md-6">
                    <textarea id="requirements" class="form-control @error('requirements') is-invalid @enderror" name="requirements" required autocomplete="requirements">{{ old('requirements') }}</textarea>
                    @error('requirements')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                <div class="col-md-6">
                    <input id="deadline" type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}" required autocomplete="deadline">

                    @error('deadline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div>
            </div>  

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </form> 

      
    </div>
</div>



@endsection

@push('pages-script')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#category').select2();
        });
    </script>

@endpush


