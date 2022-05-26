@extends('exam_center.layouts.exam_center_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Candidates List</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="">List of Jobs</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Candidates List</strong>
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Candidates List</h3>
                            </div>
                            <div class="col-md-12">
                                <form method="GET" id="filterForm" class="mt-3">
                                    <div class="row" id="job-search-row">
                                        <div class="col-md-4 col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label>Districts</label>
                                                <select class="load_select form-control filter" id="district_id"
                                                    name="district_id" data-target="taluka_id"
                                                    data-url="{{ route('list-talukas') }}">
                                                    <option value="" selected disabled>Please Select</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}">{{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Talukas</label>
                                                <select
                                                    class="load_select form-control  @error('taluka_id') is-invalid @enderror"
                                                    name="taluka_id" id="taluka_id" data-target="village_id"
                                                    data-url="{{ route('list-villages') }}">
                                                    <option value="" selected disabled>Select Taluka</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label>Village Name </label>
                                                <select
                                                    class="load_select form-control  @error('village_id') is-invalid @enderror"
                                                    name="village_id" id="village_id" data-target="union_council_id"
                                                    data-url="{{ route('list-union-councils') }}">
                                                    <option value="" selected disabled>Select Villages</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label>Union Council</label>
                                                <select
                                                    class="load_select form-control  @error('union_council_id') is-invalid @enderror"
                                                    name="union_council_id" id="union_council_id" data-target="school_id"
                                                    data-url="{{ route('list-schools') }}">
                                                    <option value="" selected disabled>Select Union Council</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label for="school_id">School Name </label>
                                                <select data-placeholder="Select School" class="form-control"
                                                    name="school_id" id="school_id">
                                                    <option value="">Select a School</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label>Preference Order</label>
                                                <select id="pref_order" class="form-control">
                                                    <option value="" selected>All Preferences</option>
                                                    <option value="1">Preference # 1</option>
                                                    <option value="2">Preference # 2</option>
                                                    <option value="3">Preference # 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label>Application Status</label>
                                                <select id="candidate_status" class="form-control">
                                                    <option value="" selected>All Applications</option>
                                                    <option value="pending">Pending Applications</option>
                                                    <option value="shortlisted">Shortlisted Applications</option>
                                                    <option value="invited">Invited Applications</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="m-b" role="form" method="post" enctype="multipart/form-data"
                            action="{{ route('export-shortlisted-candidates') }}">
                            @csrf
                            <div class="form-group row text-right">
                                <div class="col-md-12 text-right">
                                    <div id="action_btn_all" style="display: none">
                                        <button class="btn-primary btn mr-0" id="shortlist_all_candidate" value="">Shortlist
                                            All</button>
                                        <button id="invite_all_candidate" class="btn-warning btn">Invite
                                            All</button>
                                        {{-- <button class="btn btn-primary " value="submit" name="submit" type="submit"><i
                                                class="fa fa-file-excel-o"></i>&nbsp;&nbsp;<span
                                                class="bold">Export</span></button> --}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="export_btn" style="display: block">
                                        <button class="btn btn-primary " value="submit" name="submit" type="submit"><i
                                                class="fa fa-file-excel-o"></i>&nbsp;&nbsp;<span
                                                class="bold">Export</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table id="job-list" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <input id="select_all" type="checkbox" value="">
                                    </th>
                                    <th>Candidate Name</th>
                                    <th>Job Title</th>
                                    <th>CNIC</th>
                                    <th>Mobile Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
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
            var candidate_status = null;
            var district_id = null;
            var taluka_id = null;
            var village_id = null;
            var union_council_id = null;
            var school_id = null;
            var pref_order = null;
            var jobList = $('#job-list').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                scrollX: true,
                searching: true,
                paging: true,
                pageLength: 100,
                ordering: false,
                bLengthChange: false,
                "order": [
                    [0, "desc"]
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Search..."
                },
                ajax: {
                    url: "{{ route('job-candidate-list', $data->id) }}",
                    data: function(d) {
                        d.candidate_status = candidate_status;
                        d.district_id = district_id;
                        d.taluka_id = taluka_id;
                        d.village_id = village_id;
                        d.union_council_id = union_council_id;
                        d.school_id = school_id;
                        d.pref_order = pref_order;
                    },
                },
                "initComplete": function(settings, json) {
                    // alert( 'DataTables has finished its initialisation.' );
                    // $('#select_all').iCheck({
                    //     checkboxClass: 'icheckbox',
                    // }).on('ifChecked', function(event) {

                    //     console.log('check all checkbox');

                    // }).on('ifUnchecked', function(event) {
                    //     console.log('un-check all checkbox');

                    // });
                },
                "drawCallback": function(settings) {

                    $(document).on('click', '#select_all', function(e) {
                        if ($(this).is(":checked") == false) {
                            console.log('uncheck');
                            $('.checkbox').prop('checked', false);
                            document.getElementById('action_btn_all').style.display = "none";
                            document.getElementById('export_btn').style.display = "block";

                        } else {
                            console.log('checked');
                            document.getElementById('action_btn_all').style.display = "block";
                            document.getElementById('export_btn').style.display = "none";
                            $('.checkbox').prop('checked', true);
                        }
                    });
                },
                columns: [{
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        serachable: false,
                        width: "5%",
                        sClass: 'text-center',
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'job_announcement.job_title',
                        name: 'job_announcement.job_title'
                    }, //candidate cnic number
                    {
                        data: 'user.cnic_number',
                        name: 'user.cnic_number'
                    }, //candidate exam title
                    {
                        data: 'user.mobile_number',
                        name: 'user.mobile_number'
                    }, //candidate exam registration numner
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        serachable: false,
                        width: "5%",
                        sClass: 'text-center',
                    },
                ]
            });


            $(document).on('change',
                '#candidate_status, #district_id, #taluka_id, #village_id, #union_council_id, #school_id,#pref_order',
                function(e) {
                    candidate_status = $('#candidate_status').val();
                    district_id = $('#district_id').val();
                    taluka_id = $('#taluka_id').val();
                    village_id = $('#village_id').val();
                    union_council_id = $('#union_council_id').val();
                    school_id = $('#school_id').val();
                    pref_order = $('#pref_order').val();
                    console.log('searching...', candidate_status, district_id, taluka_id, village_id,
                        union_council_id, school_id);
                    $('#select_all').prop('checked', false);
                    document.getElementById('action_btn_all').style.display = "none";
                    document.getElementById('export_btn').style.display = "block";
                    jobList.ajax.reload(null, false);
                });


            $(document).on('click', '#shortlist_all_candidate', function(e) {
                e.preventDefault();

                swal({
                    title: "Are you sure?",
                    text: "You want to shortlist all selected candidates",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                }, function() {
                    var shorlistIDs = [];
                    $('input[name="common_name"]:checked').each(
                        function() {
                            shorlistIDs.push(this.value)
                        });
                    $.ajax({
                        url: "{{ route('shortlist-all-candidates') }}",
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        type: "POST",
                        data: {
                            'shortlisted_IDS': shorlistIDs
                        },
                        cache: false,
                        success: function(data) {
                            console.log(data)
                            $('#select_all').prop('checked', false);
                            document.getElementById('action_btn_all').style.display =
                                "none";
                            document.getElementById('export_btn').style.display =
                                "block";
                            jobList.ajax.reload(null, false);
                        },
                        error: function() {

                        },
                        beforeSend: function() {
                            showLoading();
                        },
                        complete: function() {
                            hideLoading();
                        }
                    });
                });
            });

            $(document).on('click', '#invite_all_candidate', function(e) {
                e.preventDefault();

                swal({
                    title: "Are you sure?",
                    text: "You want to invite all selected candidates",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                }, function() {
                    var inviteIDs = [];
                    $('input[name="common_name"]:checked').each(
                        function() {
                            inviteIDs.push(this.value)
                        });
                    $.ajax({
                        url: "{{ route('invite-all-candidates') }}",
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        type: "POST",
                        data: {
                            'invited_IDS': inviteIDs
                        },
                        cache: false,
                        success: function(data) {
                            console.log(data)
                            $('#select_all').prop('checked', false);
                            document.getElementById('action_btn_all').style.display =
                                "none";
                            document.getElementById('export_btn').style.display =
                                "block";
                            jobList.ajax.reload(null, false);
                        },
                        error: function() {

                        },
                        beforeSend: function() {
                            showLoading();
                        },
                        complete: function() {
                            hideLoading();
                        }
                    });
                });
            });


            $(document).on('click', '#shortlist-candidate', function(e) {
                e.preventDefault();
                let id = $(this).val();
                console.log($(this).val())
                swal({
                    title: "Are you sure?",
                    text: "You want to shortlist this candidate?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                }, function() {
                    $.ajax({
                        url: "/shortlisted-candidate-info/" + id,
                        type: "GET",
                        success: function(response) {
                            if (response) {
                                jobList.ajax.reload(null, false);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            });

            $(document).on('click', '#invited-candidate', function(e) {
                e.preventDefault();
                let id = $(this).val();
                console.log($(this).val())
                swal({
                    title: "Are you sure?",
                    text: "You want to invite this candidate?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                }, function() {
                    $.ajax({
                        url: "/invited-candidate-info/" + id,
                        type: "GET",
                        success: function(response) {

                            if (response) {
                                jobList.ajax.reload(null, false);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });


            });
            $(document).on('keyup', '#search_term', function(e) {
                console.log('searching...');
                jobList.ajax.reload(null, false);
            });
        });
    </script>
@endpush
