@extends('exam_center.layouts.exam_center_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>List of Districts</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>List of Districts</strong>
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @if (isset($district))
        @include('exam_center.districts.edit_district')
    @else
        @include('exam_center.districts.add_district')
    @endif
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>List of Districts</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="wrapper wrapper-content">
                            <div class="table-responsive">
                                <table id="districts-list" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Abbreviation</th>
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
            var jobList = $('#districts-list').DataTable({
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
                    url: "{{ route('districts.index') }}"
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
