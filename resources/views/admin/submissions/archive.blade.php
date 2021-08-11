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
                        Archive Submissions
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Archive</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Submissions
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Dynamic Table Full -->
        <div class="block block-rounded row">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    submissions
                </h3>
            </div>
            <div class="block-content block-content-full overflow-scroll">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-striped table-hover table-vcenter fs-sm">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">phone</th>
                        <th scope="col">Registered</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($submissions)
                            @foreach($submissions as $submission)
                                <tr>
                                    <td>{{$submission->name ? $submission->name : 'No Name'}}</td>
                                    <td>{{$submission->email ? $submission->email : 'No Email'}}</td>
                                    <td>{{$submission->phone ? $submission->phone : 'No Phone'}}</td>
                                    <td>{{$submission->created_at ? $submission->created_at->diffForHumans() : 'No Date'}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('submissions.show', $submission->id)}}"><button type="button" class="btn btn-sm btn-alt-secondary mx-1" data-bs-toggle="tooltip" title="Show Submission">
                                                    <i class="fa far fa-eye"></i>
                                                </button>
                                            </a>
                                            {!! Form::open(['method'=>'PATCH',
                                                'action'=>['App\Http\Controllers\AdminSubmissionController@UnArchiveSubmission', $submission->id]]) !!}
                                                <div class="form-group">
                                                    {!! Form::button('<i class="si si-refresh"></i>', ['type'=>'submit','class'=>'btn btn-sm btn-alt-secondary mx-1', 'data-bs-toggle'=> "tooltip", 'title'=>"Set Back Submission"]) !!}
                                                </div>
                                            {!! Form::close() !!}
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
