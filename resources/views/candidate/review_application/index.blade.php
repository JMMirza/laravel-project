@extends('candidate.layouts.candidate_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Review Job Application</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Review Job Application</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="domicile-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-body">
                    <div class="text-center">
                        <img class="d-block w-100" src="{{ \Auth::user()->domicile_url }}" alt="domicile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="CNIC-front-img-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-body">
                    <div class="text-center">
                        <img class="d-block w-100" src="{{ \Auth::user()->cnic_front_picture_url }}" alt="Front Picture">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="CNIC-back-img-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-body">
                    <div class="text-center">
                        <img class="d-block w-100" src="{{ \Auth::user()->cnic_back_picture_url }}" alt="Front Picture">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="wrapper wrapper-content">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-6">
                <h2>Personal Information</h2>
            </div>
            <div class="col-md-6">
                <a href="{{ route('update-profile') }}" class="btn btn-success float-right mt-3"> Edit </a>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Complete Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Please Enter Your Complete Name" value="{{ $user->name }}" disabled>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gender <span class="text-danger">*</span></label>
                    <select class="form-control m-b  @error('status') is-invalid @enderror" name="gender" id="gender"
                        disabled>
                        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male
                        </option>
                        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Father/Husband Name <span class="text-danger">*</span></label>
                    <input type="text" name="father_name" id="father_name"
                        class="form-control @error('father_name') is-invalid @enderror"
                        placeholder="Please Enter Your Father's Name" value="{{ $user->father_name }}" disabled>
                    @error('father_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    <label>Contact No. <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="mobile_number" id="mobile_number"
                            class="form-control @error('mobile_number') is-invalid @enderror" {{-- data-inputmask="'mask': '923999999999'" --}}
                            placeholder="Please Enter Contact No." value="{{ $user->mobile_number }}" disabled>
                    </div>

                    @error('mobile_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <small class="text-muted form-text m-b-none text-right">Format:
                        923001234567</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Please Enter Email Address" value="{{ $user->email }}" disabled>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>CNIC / Passport No <span class="text-danger">*</span></label>
                    <input type="text" name="cnic_number" class="form-control @error('cnic_number') is-invalid @enderror"
                        data-inputmask="'mask': '99999-9999999-9'" placeholder="Please Enter CNIC or Passport No."
                        value="{{ $user->cnic_number }}" disabled>
                    @error('cnic_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>CNIC / Passport Front Side Picture <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input id="cnic_front_img" name="cnic_front_img" type="file" class="file_name custom-file-input"
                            data-span="cnic_front" disabled>
                        <label for="logo" class="custom-file-label">CNIC Front Side
                            Picture </label>
                        <input type="text" value="{{ $user->cnic_front_img }}" id="cnicFrontImg" hidden>
                        <span class="invalid-feedback" id="invalid-feedback-cfi" role="alert">
                        </span>
                    </div>
                    @error('cnic_front_img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="form-text text-success m-b-none" id="cnic_front"></span>
                    {{-- <span
                                                class="form-text m-b-none text-right">{{ $user->cnic_front_img }}</span> --}}
                    <small class="text-muted form-text m-b-none text-right"><a data-toggle="modal"
                            data-target="#CNIC-front-img-modal" href="" title="Picture Front Side"><i
                                class="fa fa-plus-circle"></i> Preview
                            Front Side
                            Picture</a></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>CNIC / Passport Back Side Picture <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input id="cnic_back_img" name="cnic_back_img" type="file" class="file_name custom-file-input"
                            data-span="cnic_back" disabled>
                        <label for="logo" class="custom-file-label">CNIC Back Side
                            Picture </label>
                        <input type="text" value="{{ $user->cnic_back_img }}" id="cnicBackImg" hidden>
                        <span id="invalid-feedback-cbi" class="invalid-feedback" role="alert"></span>
                    </div>
                    @error('cnic_back_img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="form-text text-success m-b-none" id="cnic_back"></span>
                    {{-- <span
                                                class="form-text m-b-none text-right">{{ $user->cnic_back_img }}</span> --}}
                    <small class="text-muted form-text m-b-none text-right"><a data-toggle="modal"
                            data-target="#CNIC-back-img-modal" href="" title="Picture Back Side" data-gallery=""><i
                                class="fa fa-plus-circle"></i> Preview Back Side
                            Picture</a></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Place of Birth <span class="text-danger">*</span></label>
                    <input type="text" name="place_of_birth" id="place_of_birth"
                        class="form-control @error('place_of_birth') is-invalid @enderror"
                        placeholder="Please Enter Place of Birth" value="{{ $user->place_of_birth }}" disabled>
                    @error('place_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Maritial Status <span class="text-danger">*</span></label>
                    <select class="form-control m-b  @error('maritial_status') is-invalid @enderror" name="maritial_status"
                        id="maritial_status" disabled>
                        <option value="" {{ $user->maritial_status == '' ? 'selected' : '' }} disabled>
                            Select an Option</option>
                        <option value="single" {{ $user->maritial_status == 'single' ? 'selected' : '' }}>
                            Single</option>
                        <option value="married" {{ $user->maritial_status == 'married' ? 'selected' : '' }}>
                            Married
                        </option>
                    </select>
                    @error('maritial_status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date of Birth <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" id="dob" name="dob"
                            class="inputgcogroup form-control @error('dob') is-invalid @enderror"
                            placeholder="Date of Birth" value="{{ $user->dob }}" disabled>
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label>Religion <span class="text-danger">*</span></label>
                    <select class="form-control m-b  @error('religion') is-invalid @enderror" name="religion" id="religion"
                        disabled>
                        <option value="" {{ $user->religion == '' ? 'selected' : '' }}>
                            Select an option</option>
                        <option value="Islam" {{ $user->religion == 'Islam' ? 'selected' : '' }}>
                            Islam</option>
                        <option value="Hinduism" {{ $user->religion == 'Hinduism' ? 'selected' : '' }}>
                            Hinduism
                        </option>
                        <option value="Christianity" {{ $user->religion == 'Christianity' ? 'selected' : '' }}>
                            Christianity
                        </option>
                        <option value="Other" {{ $user->religion == 'Other' ? 'selected' : '' }}>
                            Other
                        </option>
                    </select>
                    @error('religion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Please Select Domicile District <span class="text-danger">*</span></label>
                    <select class="load_select form-control  @error('district_id') is-invalid @enderror"
                        name="district_id" id="district_id" data-target="taluka_id"
                        data-url="{{ route('list-taluka-profile') }}" disabled>
                        <option value="" selected disabled>Select District</option>
                        @foreach ($districts as $single)
                            <option {{ $single->id == $user->district_id ? 'selected' : '' }}
                                value="{{ $single->id }}">
                                {{ $single->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('district_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Please Select Domicile Taluka <span class="text-danger">*</span></label>
                    <select class="form-control  @error('taluka_id') is-invalid @enderror" name="taluka_id" id="taluka_id"
                        disabled>
                        <option value="" selected disabled>Select Taluka</option>
                        @foreach ($talukas as $single)
                            <option {{ $single->id == $user->taluka_id ? 'selected' : '' }} value="{{ $single->id }}">
                                {{ $single->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('taluka_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Please Enter Domicile Union Council <span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('union_council') is-invalid @enderror"
                        name="union_council" id="union_council" placeholder="Union Council"
                        value="{{ $user->union_council }}" disabled>
                    @error('union_council')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Domicile No <span class="text-danger">*</span></label>
                    <input type="text" id="domicile_number" name="domicile_number"
                        class="form-control @error('domicile_number') is-invalid @enderror"
                        placeholder="Please Enter Domicile No." value="{{ $user->domicile_number }}" disabled>
                    @error('domicile_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Domicile <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input name="domicile" id="domicile" type="file"
                            class="file_name custom-file-input @error('domicile') is-invalid @enderror"
                            data-span="domicile_img">
                        <label for="domicile" class="custom-file-label" disabled>Upload
                            Domicile</label>
                        <input type="text" value="{{ $user->domicile }}" id="domicilePicture" hidden>
                        <span class="invalid-feedback" id="invalid-feedback-domicile" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    @error('domicile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="row">
                        <div class="col-sm-6">
                            <span class="form-text text-success m-b-none" id="domicile_img"></span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted form-text m-b-none text-right"><a data-toggle="modal"
                                    data-target="#domicile-modal" href="" title="Domicile" data-gallery=""><i
                                        class="fa fa-plus-circle"></i> Preview Domicile
                                    Picture</a></small>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Current Address / Postal Address<span class="text-danger">*</span></label>
                    <textarea class="form-control  @error('current_address') is-invalid @enderror"
                        placeholder="Please Enter Current Address" name="current_address" id="current_address"
                        disabled>{{ $user->current_address }}</textarea>
                    @error('current_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Permanent Address <span class="text-danger">*</span></label>
                    <textarea class="form-control  @error('permanent_address') is-invalid @enderror"
                        placeholder="Please Enter Permanent Address" name="permanent_address" id="permanent_address"
                        disabled>{{ $user->permanent_address }}</textarea>
                    @error('permanent_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="hr-line-dashed"></div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-6">
                <h2>Educational Qualification</h2>
            </div>
            <div class="col-md-6">
                <a href="{{ route('documents-upload') }}" class="btn btn-success float-right mt-3"> Edit </a>
            </div>
            <div class="col-md-12">
                <table class="border table table-sm">
                    <tr>
                        <th rowspan="2">Degree</th>
                        <th rowspan="2">Institute</th>
                        <th rowspan="2">Roll No</th>
                        <th colspan="2" style="text-align: center">Marks</th>
                        <th rowspan="2">%</th>
                        <th colspan="2" style="text-align: center">Year</th>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>Obtained</th>
                        <th>Addmission</th>
                        <th>Passing</th>
                    </tr>
                    @if (count($education) > 0)
                        @foreach ($education as $edu)
                            <tr>
                                <td>{{ ucfirst($edu->academic_achievement) }}</td>
                                <td>{{ ucfirst($edu->institute_name) }}</td>
                                <td>{{ $edu->roll_number }}</td>
                                <td>{{ $edu->total_marks }}</td>
                                <td>{{ $edu->obtain_marks }}</td>
                                <td>{{ round(($edu->obtain_marks / $edu->total_marks) * 100) }}%</td>
                                <td>{{ $edu->year_of_admission }}</td>
                                <td>{{ $edu->passing_year }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan='8' align="center"> No Record Found!</td>

                        </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="hr-line-dashed"></div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-6">
                <h2>Diploma/Certifications</h2>
            </div>
            <div class="col-md-6">
                <a href="{{ route('user-certificates.index') }}" class="btn btn-success float-right mt-3"> Edit </a>
            </div>
            <div class="col-md-12">
                <table class="border table table-sm">
                    <tr>
                        <th rowspan="2">Certification/Diploma</th>
                        <th rowspan="2">Institute</th>
                        <th rowspan="2">Duration</th>
                        <th colspan="2" style="text-align: center">Date</th>
                    </tr>
                    <tr>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                    @if (count($certificate) > 0)
                        @foreach ($certificate as $cert)
                            <tr>
                                <td align="center">{{ ucfirst($cert->name) }}</td>
                                <td align="center">{{ ucfirst($cert->institute_name) }}</td>
                                <td align="center">{{ $cert->duration }}</td>
                                <td align="center">{{ $cert->start_date }}</td>
                                <td align="center">{{ $cert->end_date }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan='5' align="center"> No Record Found!</td>

                        </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="hr-line-dashed"></div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-6">
                <h2>Work Experiences</h2>
            </div>
            <div class="col-md-6">
                <a href="{{ route('user-experiences.index') }}" class="btn btn-success float-right mt-3"> Edit </a>
            </div>
            <div class="col-md-12">
                <table class="border table table-sm">
                    <tr>
                        <th rowspan="2">Orgnaization</th>
                        <th rowspan="2">Designation</th>
                        <th colspan="2" style="text-align: center">Date </th>
                        {{-- <th></th> --}}
                    </tr>
                    <tr>
                        <th>Joining Date</th>
                        <th>Ending Date</th>
                    </tr>
                    @if (count($experience) > 0)
                        @foreach ($experience as $exp)
                            <tr>
                                <td>{{ ucfirst($exp->organization_name) }}</td>
                                <td>{{ ucfirst($exp->designation) }}</td>
                                <td>{{ $exp->date_from }}</td>
                                @if ($exp->present)
                                    <td>Present</td>
                                @else
                                    <td>{{ $exp->date_to }}</td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan='4' align="center"> No Record Found!</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="hr-line-dashed"></div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-6">
                <h2>Job Preferences</h2>
            </div>
            <div class="col-md-6">
                <a href="{{ route('job-preferences.index') }}" class="btn btn-success float-right mt-3"> Edit </a>
            </div>
            <div class="col-md-12">
                <table class="border table table-sm">
                    <tr>
                        <th>School Code</th>
                        <th>District</th>
                        <th>Taluka</th>
                        <th>Village</th>
                        <th>Union Council</th>
                        <th>School</th>
                    </tr>
                    @if (count($candidate_prefrences) > 0)
                        @foreach ($candidate_prefrences as $prefrences)
                            <tr>
                                <td>{{ $prefrences->school->school_code }}</td>
                                <td>{{ ucfirst($prefrences->district->name) }}</td>
                                <td>{{ $prefrences->taluka->name }}</td>
                                <td>{{ $prefrences->village->name }}</td>
                                <td>{{ $prefrences->union_council->name }}</td>
                                <td>{{ $prefrences->school->name }}</td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan='5' align="center"> No Record Found!</td>

                        </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="hr-line-dashed"></div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-12">
                <br>
                <h3>Declaration:</h3>
                <p>
                    1. I have read and understood the programme eligibility requirement.<br>
                    2. I declare that all the information in the application is true, complete and accurate.<br>
                    3. I understand that the Premier DLC reserves the right to refuse/cancel/declare null and void my
                    application or appointment in
                    case of suppression of fact, misrepresent of fact misleading/false or fraudulent information.
                </p>
            </div>
            <div class="col-md-6">
                <input value="{{ auth()->user()->name }}" type="text" placeholder="Enter Name" name="name" id="name"
                    class="form-control" aria-required="true">
                <span id='invalid-feedback-decname' class='invalid-feedback' role='alert'></span>

            </div>
            <div class="col-md-6">
                <input type="text" id="date_of_apply" name="date_of_apply" class="inputgcogroup form-control"
                    value="{{ Carbon\Carbon::now()->format('d M,Y') }}"
                    placeholder="{{ Carbon\Carbon::now()->format('d M,Y') }}" disabled>
                <span id='invalid-feedback-doa' class='invalid-feedback' role='alert'></span>

            </div>
        </div>

        <div class="hr-line-dashed"></div>
        @if (count($candidate_prefrences) >= 3)
            <div class="row">
                <div class="col-md-12 float-right">
                    <button id="reviewApp" data-url="{{ route('job-apply') }}" class="btn btn-primary float-right">
                        Submit
                        Application</button>
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                You have to complete your information first.
            </div>
        @endif
    </div>
@endsection
@push('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#reviewApp', function(e) {
                e.preventDefault();

                swal({
                    title: "Attention Required!",
                    text: "Please note that you will not be able to edit any information after this stage.",
                    type: "success",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonColor: "#1AB394",
                    confirmButtonText: "Submit",
                    closeOnConfirm: true
                }, function() {
                    window.location.href = '{{ route('job-apply') }}';
                });
            });
        });
    </script>
@endpush
