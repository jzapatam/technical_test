@extends('adminlte::page')

@section('title', __('Create New Company'))

@section('content_header')
    <h1>{{ __('Create New Company') }}</h1>
@stop


@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-4 text-right">
                                <a href="{{ route('companies.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('companies.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" >

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>

                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('Logo') }}</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input{{ $errors->has('logo') ? ' is-invalid' : '' }}" id="input-image" accept="image/*">
                                        <label class="custom-file-label" for="input-image">{{ __('Select logo') }}</label>
                                    </div>

                                    @include('alerts.feedback', ['field' => 'image'])
                                </div>

                                <div class="form-group{{ $errors->has('website') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-website">{{ __('Website') }}</label>
                                    <input type="text" name="website" id="input-website" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" placeholder="{{ __('Website') }}" value="{{ old('website') }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'website'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>

        $(document).ready(function() {
            $('#companies').DataTable();
        } );


    </script>
@stop


