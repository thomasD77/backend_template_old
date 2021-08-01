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

