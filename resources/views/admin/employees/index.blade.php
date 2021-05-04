@extends('adminlte::page')

@section('title', __('Employees'))

@section('content_header')
    <h1>{{ __('Employees') }}</h1>
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
                                <a href="{{ route('employees.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Employee') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">


                        <table id="employees" class="table table-striped table-bordered" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="id">{{ __('Id') }}</th>
                                    <th scope="col" class="sort" data-sort="name">{{ __('First Name') }}</th>
                                    <th scope="col" class="sort" data-sort="email">{{ __('Last Name') }}</th>
                                    <th scope="col" class="sort" data-sort="website">{{ __('Company') }}</th>
                                    <th scope="col" class="sort" data-sort="website">{{ __('Email') }}</th>
                                    <th scope="col" class="sort" data-sort="website">{{ __('Phone') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row">
                                        {{ $employee->id }}
                                    </th>
                                    <td >
                                        {{ $employee->first_name }}
                                    </td>
                                    <td >
                                        {{ $employee->last_name }}
                                    </td>
                                    <td >
                                        {{ $employee->company->name }}
                                    </td>
                                    <td >
                                        {{ $employee->email }}
                                    </td>
                                    <td >
                                        {{ $employee->phone }}
                                    </td>
                                    <td class="table-actions">
                                        <a href="{{ route('employees.edit', $employee) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit Company">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="javascript: void(0)" class="table-action destroy_employee" id="{{$employee->id}}" name="destroy_{{$employee->id}}" data-toggle="tooltip" data-original-title="Delete Employee">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form method="post" action="{{ route('employees.destroy', $employee) }}" autocomplete="off" id="destroy_{{$employee->id}}">
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
            $('#employees').DataTable();

            $( ".destroy_employee" ).on( 'click', function () {

                if (confirm("Are you sure you want to delete this employee?")) {

                    $('#'+this.name).submit();
                }
            } );
        } );


    </script>
@stop
