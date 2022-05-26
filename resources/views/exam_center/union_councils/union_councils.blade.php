@extends('exam_center.layouts.exam_center_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>List of Union Councils</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>List of Union Councils</strong>
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @if (isset($unionCouncil))
        @include('exam_center.union_councils.edit_union_council')
    @else
        @include('exam_center.union_councils.add_union_council')
    @endif
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>List of Union Councils</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="wrapper wrapper-content">
                            <div class="table-responsive">
                                <table id="union-councils-list" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Abbreviation</th>
                                            <th>Taluka</th>
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
            var jobList = $('#union-councils-list').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                scrollX: true,
                searching: true,
                paging: true,
                pageLength: 50,
                "order": [
                    [0, "desc"]
                ],
                ajax: {
                    url: "{{ route('union-councils.index') }}"
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    }, //candidate cnic number
                    {
                        data: 'abbreviation',
                        name: 'abbreviation'
                    }, //candidate exam title
                    {
                        data: 'taluka.name',
                        name: 'taluka.name'
                    }, //candidate exam title
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        serachable: false,
                        sClass: 'text-center'
                    },
                ]
            });

            $(document).on('change', '#country_id, #state_id, #city_id', function(e) {
                console.log('searching...');
                jobList.ajax.reload(null, false);
            });

            $(document).on('keyup', '#search_term', function(e) {
                console.log('searching...');
                jobList.ajax.reload(null, false);
            });
        });
    </script>
@endpush
