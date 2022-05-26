@extends('exam_center.layouts.exam_center_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>List of Skills</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>List of Skills</strong>
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @if (isset($skill))
        @include('exam_center.skills.edit_skill')
    @else
        @include('exam_center.skills.add_skill')
    @endif
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5>List of Skills</h5>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('skills.create') }}" class="btn btn-primary" style="float: right;">
                                    <i class="fa fa-plus"></i>Add New Skill</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="wrapper wrapper-content">
                            <div class="table-responsive">
                                <table id="skills-data-table"
                                    class="table table-bordered table-striped align-middle table-nowrap mb-0"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer_scripts')
    <script>
        $(document).ready(function() {
            // init datatable.
            var jobList = $('#skills-data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                scrollX: true,
                searching: false,
                paging: false,
                pageLength: 50,
                "order": [
                    [0, "desc"]
                ],
                ajax: {
                    url: "{{ route('skills.index') }}"
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'skill_name',
                        name: 'skill_name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "5%",
                        sClass: "text-center"
                    },
                ]
            });
        });
    </script>
@endpush
