@extends('candidate.layouts.candidate_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Diploma/Certifications</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Diploma/Certifications</strong>
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content">
        <div class="form-group">
            <label>
                <h2>Do you have any diploma/certification?</h2>
            </label>
            <div class="form-control">

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio1">
                        <input class="form-check-input" type="radio" name="sef_employee" id="sef_employee_yes" value="1">
                        YES</label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio2">
                        <input class="form-check-input" type="radio" name="sef_employee" id="sef_employee_no" value="0"
                            {{ $user->sef_employee == '0' ? 'checked' : '' }}>
                        NO</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="goToNextStepDiv" class="col-md-12 text-right mb-2" style="display: none">
                <a href="{{ route('user-experiences.index') }}" class="btn btn-success"> Save & Go to Work Experience</a>
            </div>
        </div>
        <div id="showData" style="display: none">
            @if (isset($userCertificate))
                @include('candidate.user_certificates.edit_certification')
            @else
                @include('candidate.user_certificates.add_certification')
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Diploma/Certifications </h5>
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
                                            <h2><i class="fa fa-institution"></i> {{ ucfirst($single->name) }}
                                            </h2>
                                            <span>
                                                <strong> Institute Name: </strong>
                                                {{ $single->institute_name }}
                                            </span><br>
                                            <span>
                                                <strong> Start Date: </strong>
                                                {{ $single->start_date }}
                                            </span><br>
                                            <span><strong> End Date: </strong>
                                                {{ $single->end_date }}
                                            </span><br>
                                            <form role="form" id="delete-documents"
                                                action="{{ route('user-certificates.destroy', $single->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mr-1"> Delete </button>
                                            </form>
                                            <a target="_blank"
                                                href="{{ route('view-certificate-document', $single->document) }}"
                                                class="btn btn-sm btn-success mr-1"> View Document </a>
                                            <a href="{{ route('user-certificates.edit', $single->id) }}"
                                                class="btn btn-sm btn-primary mr-1"> Edit </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-secondary" role="alert">No certificate uploaded yet!
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
            $(document).on('click', '#sef_employee_yes', function(e) {
                document.getElementById('showData').style.display = "block";
                document.getElementById('goToNextStepDiv').style.display = "none";
            })
            $(document).on('click', '#sef_employee_no', function(e) {
                console.log("hello")
                document.getElementById('goToNextStepDiv').style.display = "block";
                document.getElementById('showData').style.display = "none";
            })

            $('#save_and_next').on('click', function(e) {
                var url = $(this).data('url');
                $("#add_student_certificate_form").submit(function(e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                    var formk = $('#add_student_certificate_form')[0];
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
                            console.log(data);
                            var name = $('#name').val();
                            var document = $('#document').val();
                            var duration = $('#duration').val();
                            var start_date = $('#start_date').val();
                            var end_date = $('#end_date').val();
                            var institute_name = $('#institute_name').val();
                            if (!name) {
                                $("#name").addClass("is-invalid");
                                $('#invalid-feedback-name').html(`<strong>
                                    ${data.responseJSON.errors.name[0]}
                                    </strong>`);
                            }
                            if (!document) {
                                $("#document").addClass("is-invalid");
                                $('#invalid-feedback-document').html(`<strong>
                                    ${data.responseJSON.errors.document[0]}
                                    </strong>`);
                            }
                            if (!duration) {
                                $("#duration").addClass("is-invalid");
                                $('#invalid-feedback-duration').html(`<strong>
                                    ${data.responseJSON.errors.duration[0]}
                                    </strong>`);
                            }
                            if (!start_date) {
                                $("#start_date").addClass("is-invalid");
                                $('#invalid-feedback-sdate').html(`<strong>
                                    ${data.responseJSON.errors.start_date[0]}
                                    </strong>`);
                            }
                            if (!end_date) {
                                $("#end_date").addClass("is-invalid");
                                $('#invalid-feedback-edate').html(`<strong>
                                    ${data.responseJSON.errors.end_date[0]}
                                    </strong>`);
                            }
                            if (!institute_name) {
                                $("#institute_name").addClass("is-invalid");
                                $('#invalid-feedback-iname').html(`<strong>
                                    ${data.responseJSON.errors.institute_name[0]}
                                    <strong>`);
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

            $("#start_date").flatpickr({
                altInput: true,
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
            });
            $("#end_date").flatpickr({
                altInput: true,
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
            });
        })
    </script>
@endpush
