@extends('candidate.layouts.candidate_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Educational Qualification</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Educational Qualification</strong>
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
        <div id="warningDiv" class="alert alert-danger" style="display: none">
            You must provide Bachelors Degree / Certificate details.
        </div>
        <div id="wrongInputDiv" class="alert alert-danger" style="display: none">
            Note: You have to enter your Qualifications in a sequence Starting from Matric / Equivalent.
        </div>
        @if (isset($latest_document))
            <input type="text" id="academic_achievement_value" value={{ $latest_document->academic_achievement }} hidden>
        @endif
        @if (isset($candidateDocument))
            @include('candidate.documents_upload.edit_candidate_document')
        @else
            @include('candidate.documents_upload.add_candidate_document')
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Applicant Document Details</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="col-lg-12 m-b-lg">
                            <div id="vertical-timeline" class="vertical-container light-timeline no-margins">

                                @forelse ($documents as $single)
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon blue-bg">
                                            <i class="fa fa-file-text"></i>
                                        </div>
                                        <div class="vertical-timeline-content pt-1">
                                            <h2><i class="fa fa-institution"></i> {{ ucfirst($single->institute_name) }}
                                            </h2>
                                            <h3>{{ ucfirst($single->academic_achievement) }}</h3>

                                            <span>
                                                <strong> Roll No. / Reg# No: </strong>
                                                {{ $single->roll_number }}
                                            </span><br>
                                            <span><strong> Total Marks: </strong>
                                                {{ $single->total_marks }}
                                            </span><br>
                                            <span>
                                                <strong> Obtained Marks: </strong>
                                                {{ $single->obtain_marks }}
                                            </span><br>
                                            <span class="vertical-date">
                                                <strong>Passing Year: </strong>
                                                {{ $single->passing_year }}</b>
                                            </span><br>
                                            @if (isset($single->grade))
                                                <span>
                                                    <strong> Grade: </strong>
                                                    {{ $single->grade }}
                                                </span><br>
                                            @endif
                                            <form role="form" id="delete-documents"
                                                action="{{ route('delete-educational-document', $single->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger mr-1"> Delete </button>
                                            </form>
                                            <a target="_blank"
                                                href="{{ route('view-educational-document', $single->document) }}"
                                                class="btn btn-sm btn-success mr-1"> View Document </a>
                                            <a href="{{ route('edit-educational-document', $single->id) }}"
                                                class="btn btn-sm btn-primary mr-1"> Edit </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-secondary" role="alert">No document/certificate uploaded yet!
                                    </div>
                                @endforelse
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

            $('#goToNext').on('click', function(e) {
                e.preventDefault()
                var actionUrl = $(this).data('url');
                var url = $(this).data('succurl');
                console.log(actionUrl, url)
                $.ajax({
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    type: "GET",
                    enctype: 'multipart/form-data',
                    url: actionUrl,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function(data) {
                        if (data.length > 0) {
                            console.log(data);
                            window.location.href = url;
                        } else {
                            document.getElementById("warningDiv").style.display = "block";
                        }
                    },
                    error: function(data) {

                    },

                    complete: function() {

                    }
                });

            })

            $('#save_and_next').on('click', function(e) {
                var url = $(this).data('succurl');
                $("#add_student_docs_form").submit(function(e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                    var formk = $('#add_student_docs_form')[0];
                    console.log(formk)

                    // Create an FormData object 
                    var data = new FormData(formk);
                    // data.append("CustomField", "This is some extra data, testing");
                    console.log(data)
                    var form = $(this);
                    var actionUrl = form.attr('action');
                    $.ajax({
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: actionUrl,
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function(data) {
                            if (data) {
                                window.location.href = url;
                            }
                        },
                        error: function(data) {
                            var academic_achievement = $('#academic_achievement').val();
                            var document = $('#document').val();
                            var grade_type = $('#grade_type').val();
                            var institute_name = $('#institute_name').val();
                            var passing_year = $('#passing_year').val();
                            var roll_number = $('#roll_number').val();
                            var year_of_admission = $('#year_of_admission').val();
                            if (!academic_achievement) {
                                $("#academic_achievement").addClass("is-invalid");
                                $('#invalid-feedback-degree').html(`<strong>
                                    ${data.responseJSON.errors.academic_achievement[0]}
                                    </strong>`);
                            }
                            if (document == '') {
                                $("#document").addClass("is-invalid");
                                console.log(academic_achievement);

                                $('#invalid-feedback-document').html(`<strong>
                                    ${data.responseJSON.errors.document[0]}
                                    </strong>`);
                            }
                            if (!grade_type) {
                                $("#grade_type").addClass("is-invalid");
                                $('#invalid-feedback-grade-type').html(`<strong>
                                    ${data.responseJSON.errors.grade_type[0]}
                                    </strong>`);
                            }
                            if (!institute_name) {
                                $("#institute_name").addClass("is-invalid");
                                $('#invalid-feedback-institute').html(`<strong>
                                    ${data.responseJSON.errors.institute_name[0]}
                                    </strong>`);
                            }
                            if (!passing_year) {
                                $("#passing_year").addClass("is-invalid");
                                $('#invalid-feedback-py').html(`<strong>
                                    ${data.responseJSON.errors.passing_year[0]}
                                    </strong>`);
                            }
                            if (!roll_number) {
                                $("#roll_number").addClass("is-invalid");
                                $('#invalid-feedback-roll').html(`<strong>
                                    ${data.responseJSON.errors.roll_number[0]}
                                    </strong>`);
                            }
                            if (!year_of_admission) {
                                $("#year_of_admission").addClass("is-invalid");
                                $('#invalid-feedback-yoa').html(`<strong>
                                    ${data.responseJSON.errors.year_of_admission[0]}</strong>`);
                            }
                        },

                        complete: function() {

                        }
                    });

                });

                // $("#update_profile_btn").trigger("click");

                // setInterval(function() {
                //     console.log("clicked", url)
                // }, 1000);
            })

            $("#academic_achievement").change(function() {
                var selected_option = $('#academic_achievement').val();
                if (selected_option == 'matric') {
                    document.getElementById("masterSubjectsDiv").style.display = "none";
                    document.getElementById("phdSubjectsDiv").style.display = "none";
                    document.getElementById('bachelorsSubjectsDiv').style.display = "none";
                }
                if (selected_option == 'intermediate') {
                    document.getElementById("masterSubjectsDiv").style.display = "none";
                    document.getElementById("phdSubjectsDiv").style.display = "none";
                    document.getElementById('bachelorsSubjectsDiv').style.display = "none";
                }
                if (selected_option == 'bachelors') {
                    document.getElementById("masterSubjectsDiv").style.display = "none";
                    document.getElementById("phdSubjectsDiv").style.display = "none";
                    document.getElementById('bachelorsSubjectsDiv').style.display = "block";
                }
                if (selected_option == 'masters') {
                    document.getElementById("phdSubjectsDiv").style.display = "none";
                    document.getElementById('bachelorsSubjectsDiv').style.display = "none";
                    document.getElementById("masterSubjectsDiv").style.display = "block";
                }
                if (selected_option == 'phd') {
                    document.getElementById("phdSubjectsDiv").style.display = "block";
                    document.getElementById('bachelorsSubjectsDiv').style.display = "none";
                    document.getElementById("masterSubjectsDiv").style.display = "none";
                }
            });

            $("#major_subject").change(function() {
                var selected_subject = $('#major_subject').val();
                console.log(selected_subject)
                if (selected_subject == 'Other') {
                    document.getElementById("mastersMajorDiv").style.display = "none";
                    document.getElementById("bachelorsMajorDiv").style.display = "block";
                } else {
                    document.getElementById("bachelorsMajorDiv").style.display = "none";
                    document.getElementById("mastersMajorDiv").style.display = "none";
                }
            });

            $("#major_subject_master").change(function(e) {
                var selected_subject = $('#major_subject_master').val();
                console.log(selected_subject)
                if (selected_subject == 'Other') {
                    document.getElementById("bachelorsMajorDiv").style.display = "none";
                    document.getElementById("mastersMajorDiv").style.display = "block";
                } else {
                    e.preventDefault();
                    $('#major_subject_input').val(selected_subject);
                    console.log($('#major_subject_input').val());
                    document.getElementById("bachelorsMajorDiv").style.display = "none";
                    document.getElementById("mastersMajorDiv").style.display = "none";
                }
            });

            $("#grade_type").change(function() {
                var selected_option = $('#grade_type').val();
                if (selected_option == 'percentage') {
                    document.getElementById("cgpa").style.display = "none";
                    document.getElementById('percentage_div').style.display = "block";
                    $("#yoa_div").removeClass("col-md-4");
                    $("#yoa_div").addClass("col-md-6");
                    $("#py_div").removeClass("col-md-4");
                    $("#py_div").addClass("col-md-6");

                } else {
                    document.getElementById('percentage_div').style.display = "none";
                    document.getElementById("cgpa").style.display = "block";
                    $("#yoa_div").removeClass("col-md-4");
                    $("#yoa_div").addClass("col-md-6");
                    $("#py_div").removeClass("col-md-4");
                    $("#py_div").addClass("col-md-6");
                }
            });

            $('#obtain_marks').keyup(function(e) {
                var total_marks = parseInt($('#total_marks').val());
                var obtain_marks = parseInt($('#obtain_marks').val());
                var percentage = (obtain_marks / total_marks) * 100
                $('#percentage').val(percentage.toFixed(2));
            })

            $('#add_student_docs_form').on('submit', function(e) {
                var academic_achievement_value = $('#academic_achievement_value').val();
                var academic_achievement = $('#academic_achievement').val();
                if (academic_achievement_value == undefined) {
                    if (academic_achievement != 'matric') {
                        e.preventDefault()
                        $("#academic_achievement").addClass("is-invalid");
                        $('#invalid-feedback-degree').html(`<strong>
                                    Please enter matric record first
                                    </strong>`);
                        document.getElementById('wrongInputDiv').style.display = 'block'
                    }

                } else if (academic_achievement_value == 'matric') {
                    if (academic_achievement != 'intermediate') {
                        e.preventDefault()
                        $("#academic_achievement").addClass("is-invalid");
                        $('#invalid-feedback-degree').html(`<strong>
                                    Please enter intermediate record first
                                    </strong>`);
                        document.getElementById('wrongInputDiv').style.display = 'block'
                    }

                } else if (academic_achievement_value == 'intermediate') {
                    if (academic_achievement != 'bachelors') {
                        e.preventDefault()
                        $("#academic_achievement").addClass("is-invalid");
                        $('#invalid-feedback-degree').html(`<strong>
                                    Please enter bachelors record first
                                    </strong>`);
                        document.getElementById('wrongInputDiv').style.display = 'block'
                    }

                } else if (academic_achievement_value == 'bachelors') {
                    if (academic_achievement != 'masters') {
                        e.preventDefault()
                        $("#academic_achievement").addClass("is-invalid");
                        $('#invalid-feedback-degree').html(`<strong>
                                    Please enter masters record first
                                    </strong>`);
                        document.getElementById('wrongInputDiv').style.display = 'block'
                    }

                } else if (academic_achievement_value == 'masters') {
                    if (academic_achievement != 'phd') {
                        e.preventDefault()
                        $("#academic_achievement").addClass("is-invalid");
                        $('#invalid-feedback-degree').html(`<strong>
                                    Please enter PHD record first
                                    </strong>`);
                        document.getElementById('wrongInputDiv').style.display = 'block'
                    }

                } else {
                    if (academic_achievement != 'phd') {
                        e.preventDefault()
                        $("#academic_achievement").addClass("is-invalid");
                        $('#invalid-feedback-degree').html(`<strong>
                                    Please enter PHD record first
                                    </strong>`);
                        document.getElementById('wrongInputDiv').style.display = 'block'
                    }
                }
                console.log(academic_achievement_value)
                var total_marks = parseInt($('#total_marks').val());
                var total_cgpa = parseInt($('#total_cgpa').val());
                var obtain_cgpa = parseInt($('#obtain_cgpa').val());
                var obtain_marks = parseInt($('#obtain_marks').val());
                var grade_type = $('#grade_type').val()
                // console.log(obtain_marks > total_marks, obtain_marks, total_marks)
                if (grade_type == 'percentage') {
                    if (!total_marks) {
                        $("#total_marks").addClass("is-invalid");
                        $('#invalid-feedback-tmark').text("Please enter Total Marks");
                        e.preventDefault()
                    }
                    if (!obtain_marks) {
                        $("#obtain_marks").addClass("is-invalid");
                        $('#invalid-feedback-omark').text("Please enter Obtain Marks");

                        e.preventDefault()
                    }
                    if (obtain_marks > total_marks) {
                        $("#total_marks").addClass("is-invalid");
                        $('#invalid-feedback-tmark').text("Please enter correct Total Marks");

                        $("#obtain_marks").addClass("is-invalid");
                        $('#invalid-feedback-omark').text("Please enter correct Obtain Marks");

                        e.preventDefault()
                    }
                }
                if (grade_type == 'cgpa') {
                    if (!total_cgpa) {
                        $("#total_cgpa").addClass("is-invalid");
                        $('#invalid-feedback-tcgpa').text("Please enter Total CGPA");

                        e.preventDefault()
                    }
                    if (!obtain_cgpa) {
                        $("#obtain_cgpa").addClass("is-invalid");
                        $('#invalid-feedback-ocgpa').text("Please enter Obtain CGPA");

                        e.preventDefault()
                    }
                    if (obtain_cgpa > total_cgpa) {
                        $("#total_cgpa").addClass("is-invalid");
                        $('#invalid-feedback-tcgpa').text("Please enter correct Total CGPA");

                        $("#obtain_cgpa").addClass("is-invalid");
                        $('#invalid-feedback-ocgpa').text("Please enter correct Obtain CGPA");
                        e.preventDefault()
                    }
                }
            });
        });
    </script>
@endpush
