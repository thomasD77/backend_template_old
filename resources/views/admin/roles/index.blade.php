@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        DataTable Roles
                    </h1>

                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">DataTable</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Roles
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->


    <!-- Page Content -->
    <div class="content">

        <div class="mb-4 d-flex justify-content-end">
            {{--{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminUsersController@store']]) !!}
                {!! Form::label('role', 'Role:',['class'=>'form-label']) !!}
                {!! Form::text('email',) !!}
                <div class="form-group mr-1">
                    {!! Form::submit('Update',['class'=>'btn btn-alt-primary']) !!}
                </div>
            {!! Form::close() !!}--}}

            <div class="mb-4 col-4">
                @livewire('role')
            </div>

        </div>

        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Roles
                </h3>
            </div>
            <div class="block-content block-content-full overflow-scroll">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-striped table-hover table-vcenter  fs-sm">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="d-none d-sm-table-cell" >Name</th>
                            <th class="d-none d-sm-table-cell" >Created</th>
                            <th class="d-none d-sm-table-cell" >Updated</th>
                            <th class="d-none d-sm-table-cell text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($roles)
                            @foreach($roles as $role)
                        <tr>
                            <td class="text-center">{{$role->id ? $role->id : 'No ID'}}</td>
                            <td>{{$role->name ? $role->name : 'No Role'}}</td>
                            <td>{{$role->created_at->diffForHumans()}}</td>
                            <td>{{$role->updated_at->diffForHumans()}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit Client">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Remove Client">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                            @endforeach
                       @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

    </div>
    <!-- END Page Content -->
@endsection
