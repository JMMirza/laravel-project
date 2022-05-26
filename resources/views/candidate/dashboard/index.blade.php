@extends('candidate.layouts.candidate_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Job Announcement</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Job Announcement</strong>
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
        {{-- <form method="GET" id="filterForm">
            <div class="row" id="job-search-row">
                <div class="col-md-4 col-sm-12 mb-2">
                    <div class="form-group">
                        <select class="load_select form-control filter" id="state" name="state_id" data-target="city_id"
                            data-url="{{ route('list-cities') }}">
                            <option value="" selected disabled>Please Select</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <select class="form-control filter" id="city" name="city_id">
                            <option value="" selected>Please select</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="myInput" name="searchTerm"
                            placeholder="Search...">
                        <div class="input-group-append">
                            <button tabindex="-1" class="btn btn-primary btn-sm search" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> --}}
        <div class="row" id="jobs-list">

        </div>
    </div>

    <div class="job-detail-module">
        <div class="row">

        </div>
    </div>
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var ary = [];
            var prefrencesArr = [];
            var count = 1;

            $(document).on('click', '#applyCheckBox', function(e) {
                if ($(this).is(":checked") == false) {
                    console.log('uncheck');
                    $('#applybuttonforwarning').prop('disabled', true);
                } else {
                    console.log('checked');
                    $('#applybuttonforwarning').prop('disabled', false);
                }
            });

            $(document).on('click', '.btnDelete', function() {
                $(this).closest('tr').remove();
                var index = $(this).attr('id');
                console.log('count before', count);
                count--
                console.log('index', index, 'count after', count);
                prefrencesArr.splice(index - 1, 1);
                console.log('prefrencesArr', prefrencesArr);
            });

            $(document).on('click', '.save_preferences', function(e) {
                console.log(prefrencesArr.length);
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
            // document.getElementById
            $("#date_of_apply").flatpickr({
                altInput: true,
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
                maxDate: "today"
            });

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

        //         $(document).on('click', '.not_eligible', function(e) {
        //             e.preventDefault();
        // 
        //             swal({
        //                 title: "Information Required!",
        //                 text: "Kindly complete your personal and educational information!",
        //                 type: "warning",
        //                 showCancelButton: true,
        //                 confirmButtonColor: "#DD6B55",
        //                 // confirmButtonText: "Yes, delete it!",
        //                 closeOnConfirm: true
        //             }, function() {
        //                 window.location.href = '{{ route('update-profile') }}';
        //             });
        //         });
    </script>
@endpush
