@extends('candidate.layouts.candidate_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Application History</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Application History</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content">
        <div class="col-md-12">
            @if (isset($job))
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-md-8 float-left">
                                <h3 id="jobTitleHeading" class="col-md-6 text-center">
                                    {{ $job->job_announcement->job_title }}
                                </h3>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    @if ($job->invitation_sent != null)
                                        <div class="col-md-2 mt-2">
                                            <a target="_blank" href="{{ route('download-test-slip', $job->id) }}"
                                                data-table="application-history"
                                                class="btn btn-sm btn-primary btn-icon waves-effect">
                                                <i class="fa fa-solid fa-print" aria-hidden="true"> </i> &nbsp;&nbsp;&nbsp;
                                                Print Test Slip
                                            </a>
                                        </div>
                                    @endif
                                    <div class="col-md-2 mt-2">
                                        <a target="_blank" href="{{ route('print-job-app', $job->id) }}"
                                            data-table="application-history"
                                            class="btn btn-sm btn-success btn-icon waves-effect">
                                            <i class="fa fa-solid fa-download" aria-hidden="true"> </i> &nbsp;&nbsp;&nbsp;
                                            Download Job Application
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="col-12 p-0">
                            <div class="job_card_main">
                                <div class="row">
                                    <div class="job_card_main_txt col-md-12">
                                        <div class="row">
                                            <div class="col-md-4" id="app_status">
                                                <h3>
                                                    Application Status: {{ Str::upper($job->status) }}
                                                </h3>
                                            </div>
                                            <div class="col-md-12">
                                                {!! $job->job_announcement->job_description !!}

                                            </div>
                                            <div class="col-md-4" id="applied_date">
                                                <h3>
                                                    Applied On: {{ $job->created_at->format('d M, Y') }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Application History</h5>

                    </div>
                    <div class="ibox-content">
                        <div class="alert alert-success">
                            No records found !
                        </div>
                    </div>
                </div>
            @endif
            {{-- <div class="card-body">
                <form action="{{ route('upload-csv.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success" type="submit">Import User Data</button>
                </form>
            </div> --}}
        </div>
    </div>

@endsection

@push('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var ary = [];
            var prefrencesArr = [];
            var count = 1;

            $(document).on('click', '.btnDelete', function() {
                $(this).closest('tr').remove();
                var index = $(this).attr('id');
                console.log('count before', count);
                count--
                console.log('index', index, 'count after', count);
                prefrencesArr.splice(index - 1, 1);
                console.log('prefrencesArr', prefrencesArr);
            });

            $(document).on('click', '#applyCheckBox', function(e) {
                if ($(this).is(":checked") == false) {
                    console.log('uncheck');
                    $('#applybuttonforwarning').prop('disabled', true);
                } else {
                    console.log('checked');
                    $('#applybuttonforwarning').prop('disabled', false);
                }
            });

            $(document).on('click', '.save_preferences', function(e) {
                if (prefrencesArr.length >= 3) {
                    console.log('prefrencesArr', prefrencesArr);
                    var sendData = [];
                    prefrencesArr.forEach((element, index) => {
                        element.pref_order = index + 1;
                        sendData.push(element)

                    })
                    console.log('sendData', sendData)
                    if (sendData.length > 0) {
                        $.ajax({
                            url: "{{ route('job-preferences.store') }}",
                            headers: {
                                'X-CSRF-Token': '{{ csrf_token() }}',
                            },
                            type: "POST",
                            data: {
                                'preference_array': sendData
                            },
                            cache: false,
                            success: function(data) {
                                console.log(data)
                                window.location.href = data;
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
                    }
                } else {
                    document.getElementById('warningDivShow').style.display = "block";
                }
            });

            $(document).on('click', '#addPrefrences', function(e) {
                e.preventDefault();
                var district = $('#district_id').find(":selected").text();
                var taluka = $('#taluka_id').find(":selected").text();
                var village = $('#village_id').find(":selected").text();
                var union_council = $('#union_council_id').find(":selected").text();
                var school = $('#school_id').find(":selected").text();
                var district_id = $('#district_id').val();
                var taluka_id = $('#taluka_id').val();
                var village_id = $('#village_id').val();
                var union_council_id = $('#union_council_id').val();
                var school_id = $('#school_id').val();
                var user_id = $('.user_id').val();
                var job_application_id = $('.job_application_id').val();
                if (district_id != null && taluka_id != null && union_council_id != null &&
                    school_id != null && village_id != null) {
                    if (prefrencesArr.length < 3) {
                        prefrencesArr.push({
                            'district_id': district_id,
                            'taluka_id': taluka_id,
                            'village_id': village_id,
                            'union_council_id': union_council_id,
                            'school_id': school_id,
                            'user_id': user_id,
                            'job_id': job_application_id,
                            'pref_order': prefrencesArr.length + 1
                        });
                    }
                    console.log('increment count: ', count)
                    if (count < 4) {
                        $('#jobPrefrences > tbody').append(
                            `<tr>
                                <td>${count}</td>
                                <td class ='district_id'>${district}</td>
                                <td class ='taluka_id'>${taluka}</td>
                                <td class ='village_id'>${village}</td>
                                <td class='union_council_id'>${union_council}</td>
                                <td class='school_id'>${school}</td>
                                <td class=''><a id =${prefrencesArr.length} class="btnDelete"><i
                                                            class="fa fa-close"></i></a></td>
                                </tr>`
                        );
                        count++;
                        $("#district_id")[0].selectedIndex = 0;
                        $("#taluka_id")[0].selectedIndex = 0;
                        $("#village_id")[0].selectedIndex = 0;
                        $("#union_council_id")[0].selectedIndex = 0;
                        $("#school_id")[0].selectedIndex = 0;
                    }
                }
            });

            $(document).on('click', '.applied_btn', function(e) {

                if (prefrencesArr.length <= 3 || count < 4) {
                    prefrencesArr = [];
                    count = 1;
                }

                const job_id = $(this).val();
                var target = $(this).data('target');
                var url = $(this).data('url');
                $.ajax({
                    url: url,
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    type: "GET",
                    data: {
                        'job_id': job_id
                    },
                    cache: false,
                    success: function(data) {
                        $('#modal-div').html(data);
                        $(target).modal('show');
                        var rowCount = $('#jobPrefrences tr').length;
                        var job_preference = JSON.parse($('.job_prefrences').val());

                        if (rowCount == 4) {
                            $('#addPrefrences').prop('disabled', true);
                            $('.save_preferences').prop('disabled', true);
                        }
                        if (rowCount > 1) {
                            count = count + (rowCount - 1)
                            job_preference.forEach(element => {
                                prefrencesArr.push(element)
                            });
                        }

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

            $(document).on('click', '.Apply_now_btn', function(e) {
                if (prefrencesArr.length <= 3 || count < 4) {
                    prefrencesArr = [];
                    count = 1;
                }

                const job_id = $(this).val();
                var target = $(this).data('target');
                var url = $(this).data('url');
                $.ajax({
                    url: "{{ route('job-applications.store') }}",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    type: "POST",
                    data: {
                        'job_id': job_id
                    },
                    cache: false,
                    success: function(data) {
                        // console.log(data)
                        loadJobs();
                        $('#modal-div').html(data);
                        $(target).modal('show');
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

            loadJobs();
            $(document).on('click', '#nextBtnDec', function(e) {
                var name = $('#name').val();
                var date_of_apply = $('#date_of_apply').val();
                console.log(name, date_of_apply);
                if (name == '') {
                    $("#name").addClass("is-invalid");
                    $('#invalid-feedback-decname').text("Please enter name");
                    console.log('name, date_of_apply');

                }
                if (date_of_apply == '') {
                    $("#date_of_apply").addClass("is-invalid");
                    $('#invalid-feedback-doa').text("Please enter date");
                    console.log('name, date_of_apply');

                } else {
                    document.getElementById('declaration_div').style.display = "none";
                    document.getElementById("preference_div").style.display = "block";
                }
            });

            $(document).on('change', '#state, #city, #myInput', function(e) {
                console.log('searching...');
                loadJobs();
            });

            $("#filterForm").submit(function(e) {
                e.preventDefault();
                loadJobs();
            });
        });

        function loadJobs() {

            $.ajax({
                url: "{{ route('candidate-dashboard') }}",
                type: "GET",
                data: $('#filterForm').serializeArray(),
                cache: false,
                success: function(data) {
                    if (data) {
                        $('#jobs-list').html(data);
                    } else {
                        console.log("in else")
                        $('#jobs-list').html(`
                            <div class="col-md-12"> 
                                <div class="alert alert-success">
                                        No records found! 
                                </div>
                            </div>`);

                    }
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
        }

        $(document).on('click', '.apply_job', function(e) {
            e.preventDefault();
            let job_id = $(this).data('job_id');
            $.ajax({
                url: "{{ route('job-applications.store') }}",
                data: {
                    'job_id': job_id
                },
                cache: false,
                success: function(data) {
                    if (data) {
                        console.log(data);

                    } else {}
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


        $(document).on('click', '.not_eligible', function(e) {
            e.preventDefault();

            swal({
                title: "Information Required!",
                text: "Kindly complete your personal and educational information!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                // confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            }, function() {
                window.location.href = '{{ route('update-profile') }}';
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // init datatable.
            var dataTable = $('#application-history').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('job-applications.index') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'job_announcement.job_title',
                        name: 'job_announcement.job_title'
                    },
                    {
                        data: 'job_announcement.job_education',
                        name: 'job_announcement.job_education'
                    },
                    {
                        data: 'job_announcement.job_selection_criteria',
                        name: 'job_announcement.job_selection_criteria'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        serachable: false,
                        sClass: 'text-center'
                    },
                ]
            });

            $('.dataTables_scrollBody').removeAttr('style');
        });
    </script>
@endpush
