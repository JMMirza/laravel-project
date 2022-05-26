<div class="btn-group">
    {{-- @permission('edit-city') --}}
    <a href="{{ route('schools.edit', $row->id) }}" class="btn btn-sm btn-success btn-icon waves-effect waves-light">
        <i class="fa fa-pencil" aria-hidden="true"></i>
    </a>
    {{-- @endpermission --}}

    {{-- @permission('delete-city') --}}
    <a href="{{ route('schools.destroy', $row->id) }}" data-table="schools-list"
        class="btn btn-sm btn-danger btn-icon waves-effect  delete-record">
        <i class="fa fa-trash-o" aria-hidden="true"></i>
    </a>
</div>
{{-- @endpermission --}}

{{-- @if (!auth()->user()->hasPermission('edit-city') &&
    !auth()->user()->hasPermission('delete-city'))
    <span>N/A</span>
@endif --}}
