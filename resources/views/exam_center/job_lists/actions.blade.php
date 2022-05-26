<div class="btn-group">
    <a href="{{ route('job-candidate-info', $row->id) }}"
        class="btn btn-sm btn-primary btn-icon waves-effect waves-light mr-1">
        Candidates
    </a>
    {{-- @permission('edit-city') --}}
    <a href="{{ route('job-lists.edit', $row->id) }}"
        class="btn btn-sm btn-success btn-icon waves-effect waves-light mr-1">
        Edit
    </a>
    {{-- @endpermission --}}

    {{-- @permission('delete-city') --}}
    <a href="{{ route('job-lists.destroy', $row->id) }}" data-table="job-list"
        class="btn btn-sm btn-danger btn-icon waves-effect  delete-record mr-1">
        Delete
    </a>
</div>
{{-- @endpermission --}}

{{-- @if (!auth()->user()->hasPermission('edit-city') &&
    !auth()->user()->hasPermission('delete-city'))
    <span>N/A</span>
@endif --}}
