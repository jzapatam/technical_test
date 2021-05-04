@extends('adminlte::page')

@section('title', __('Companies'))

@section('content_header')
    <h1>{{ __('Companies') }}</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-4 text-right">
                                <a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Company') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">


                        <table id="companies" class="table table-striped table-bordered" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="id">{{ __('Id') }}</th>
                                    <th scope="col" class="sort" data-sort="name">{{ __('Name') }}</th>
                                    <th scope="col" class="sort" data-sort="email">{{ __('Email') }}</th>
                                    <th scope="col" class="sort" data-sort="website">{{ __('Website') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach ($companies as $company)
                                <tr>
                                    <th scope="row">
                                        {{ $company->id }}
                                    </th>
                                    <td >
                                        {{ $company->name }}
                                    </td>
                                    <td >
                                        {{ $company->email }}
                                    </td>
                                    <td >
                                        {{ $company->website }}
                                    </td>
                                    <td class="table-actions">
                                        <a href="{{ route('companies.edit', $company) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit Company">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="javascript: void(0)" class="table-action destroy_company" id="{{$company->id}}" name="destroy_{{$company->id}}" data-toggle="tooltip" data-original-title="Delete Company">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form method="post" action="{{ route('companies.destroy', $company) }}" autocomplete="off" id="destroy_{{$company->id}}">
                                            @csrf
                                            @method('delete')

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

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

            $( ".destroy_company" ).on( 'click', function () {

                if (confirm("Are you sure you want to delete this company?")) {

                    $('#'+this.name).submit();
                }
            } );
        } );


    </script>
@stop
