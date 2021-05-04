@extends('adminlte::page')

@section('title', __('Edit Employee'))

@section('content_header')
    <h1>{{ __('Edit Employee') }}</h1>
@stop

@section('plugins.Select2', true)

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-4 text-right">
                                <a href="{{ route('employees.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('employees.update', $employee) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-first_name">{{ __('First Name') }}</label>
                                    <input type="text" name="first_name" id="input-first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('first_name' , $employee->first_name) }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'first_name'])
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-last_name">{{ __('Last Name') }}</label>
                                    <input type="text" name="last_name" id="input-last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ old('last_name', $employee->last_name) }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'last_name'])
                                </div>

                                <div class="form-group{{ $errors->has('company_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-company_id">{{ __('Company') }}</label>
                                    <select id="companies" class="form-control{{ $errors->has('company_id') ? ' is-invalid' : '' }}" name="company_id" id="company_id">
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}" @if (old('company_id' , $employee->company_id) == $company->id) selected @endif>{{$company->name}}</option>

                                        @endforeach

                                    </select>
                                    @include('alerts.feedback', ['field' => 'company_id'])
                                </div>


                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $employee->email) }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone">{{ __('Phone') }}</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" value="{{ old('phone', $employee->phone) }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'phone'])
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
            $('#companies').select2();
        } );

    </script>
@stop


