@extends('candidate.layouts.candidate_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Work Experience</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Work Experience</strong>
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
        <div class="form-group">
            <label>
                <h2>Do you have any work experience?</h2>
            </label>
            <div class="form-control">

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio1">
                        <input class="form-check-input" type="radio" name="sef_employee" id="sef_employee_yes" value="1">
                        YES</label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio2">
                        <input class="form-check-input" type="radio" name="sef_employee" id="sef_employee_no" value="0">
                        NO</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="goToNextStepDiv" class="col-md-12 text-right mb-2" style="display: none">
                <a href="{{ route('job-preferences.index') }}" class="btn btn-success"> Save & Go to Job Preferences</a>
            </div>
        </div>

        <div id="showData" style="display: none">
            @if (isset($userExperience))
                @include('candidate.user_experiences.edit_user_experience')
            @else
                @include('candidate.user_experiences.add_user_experience')
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Work Experience Details</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="col-lg-12 m-b-lg">
                            <div id="vertical-timeline" class="vertical-container light-timeline no-margins">

                                @forelse ($userExperiences as $single)
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon blue-bg">
                                            <i class="fa fa-file-text"></i>
                                        </div>
                                        <div class="vertical-timeline-content pt-1">
                                            <h2><i class="fa fa-institution"></i>
                                                {{ ucfirst($single->organization_name) }}
                                            </h2>
                                            <h3>{{ ucfirst($single->designation) }}</h3>

                                            <span>
                                                <strong> Date of Joining: </strong>
                                                {{ $single->date_from }}
                                            </span><br>
                                            <span><strong> Date of Leaving: </strong>
                                                @if (isset($single->date_to))
                                                    {{ $single->date_to }}
                                                @else
                                                    N/A
                                                @endif
                                            </span><br>


                                            <form action="{{ route('user-experiences.destroy', $single) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-danger mr-2" type="submit">Delete</button>
                                            </form>
                                            @if (isset($single->experience_letter))
                                                <a target="_blank"
                                                    href="{{ route('user-experiences.show', $single->experience_letter) }}"
                                                    class="btn btn-sm btn-success mr-1"> View Document </a>
                                            @endif
                                            <a href="{{ route('user-experiences.edit', $single->id) }}"
                                                class="btn btn-sm btn-primary mr-1"> Edit </a>

                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-secondary" role="alert">
                                        No document/certificate uploaded yet!
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
            })
            $(document).on('click', '#sef_employee_no', function(e) {
                var url = "{{ route('job-applications.index') }}";
                document.getElementById('goToNextStepDiv').style.display = "block";
            })
            $('#save_and_next').on('click', function(e) {
                var url = $(this).data('url');
                $("#add_student_experience_form").submit(function(e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                    var formk = $('#add_student_experience_form')[0];
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
                            var organization_name = $('#organization_name').val();
                            var date_from = $('#date_from').val();
                            var date_to = $('#date_to').val();
                            var designation = $('#designation').val();
                            if (!organization_name) {
                                $("#organization_name").addClass("is-invalid");
                                $('#invalid-feedback-oname').html(`<strong>
                                    ${data.responseJSON.errors.organization_name[0]}
                                    </strong>`);
                            }
                            if (!date_from) {
                                $("#date_from").addClass("is-invalid");
                                $('#invalid-feedback-datef').html(`<strong>
                                ${data.responseJSON.errors.date_from[0]}
                                </strong>`);
                            }
                            if ($('#present').prop('checked') == false && !date_to) {
                                // if (!date_to) {
                                $("#date_to").addClass("is-invalid");
                                $('#invalid-feedback-datet').html(`<strong>
                                    The date to field is required.</strong>`);
                            }
                            if (!designation) {
                                $("#designation").addClass("is-invalid");
                                $('#invalid-feedback-designation').html(`<strong>
                                ${data.responseJSON .errors.designation[0]}
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
            });
            $(function() {
                $("#present").click(() => {
                    if ($('#present').prop('checked')) {
                        console.log($('#present').val())
                        // $("#date_to").flatpickr("disable");
                        $("#date_to").flatpickr({
                            clickOpens: false
                        });
                    } else {
                        $("#date_to").flatpickr({
                            clickOpens: true,
                            altInput: true,
                            dateFormat: "Y-m-d",
                            altFormat: "F j, Y",
                        });
                    }
                });
            });
            $("#date_from").flatpickr({
                altInput: true,
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
            });

            $("#date_to").flatpickr({
                altInput: true,
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
            });



        })
    </script>
@endpush
