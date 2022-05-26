@extends('candidate.layouts.candidate_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Candidate Profile</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Candidate Profile</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="cendidate_profile-bg col-md-12">
            <div class="col-md-2">
                <div class="profile-img-circle">
                    <img alt="image" class="rounded-circle user-image new-design"
                        src="{{ \Auth::user()->profile_picture_url }}" />
                </div>
                <div id="edit_icon"><i class="fa fa-edit pr-0"></i></div>
                <input type="text" value="{{ $user->profile_picture }}" id="profilePictureName" hidden>
                <input type="file" name="upload_image" id="upload_image" accept="image/*" style="display: none;" />
            </div>
            <div class="col-md-10">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="cendidate-profile-top-left">
                            <h5>Candidate Profile</h5>
                            <h2>{{ $user->name }} </span></h2>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="edit-btn-outer">
                            <button id="edit_p_btn" class="edit-profile-btn" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i
                                    class="fa fa-edit"></i>Edit Profile</button>
                        </div>
                    </div> --}}
                    <div class="section-devider-line col-md-12"></div>
                    <div class="cendidate_inf0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="cendidate-info-single">
                                    <h4><i class="fa fa-envelope"></i>&nbsp;&nbsp;{{ $user->email }}</h4>
                                    <h4><i
                                            @if ($user->gender == 'Male') class="fa fa-solid fa-mars" @else class="fa fa-solid fa-venus" @endif></i>&nbsp;&nbsp;{{ $user->gender }}
                                    </h4>
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="cendidate-info-single">
                                    <h5><i class="fa fa-phone"></i>&nbsp;&nbsp;{{ $user->mobile_number }}</h5>
                                    <h5><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ $user->city->name }},
                                        {{ $user->city->state->name }}
                                        , {{ $user->city->state->country->name }}
                                    </h5>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="cendidate-info-single">
                                    <h4><i class="fa fa-id-card"></i>&nbsp;&nbsp;{{ $user->cnic_number }}</h4>
                                    <h4><i class="fa fa-phone"></i>&nbsp;&nbsp;+{{ $user->mobile_number }}</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="verify-mobile-number-modal" tabindex="-1" role="dialog" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header p-1" id="number_string">

                </div>
                <div class="modal-body p-1">
                    <form class="m-t" role="form" id="form-verify-mobile-number">
                        @csrf
                        <div class="modal-body p-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Four digt code <span class="text-danger">*</span></label>
                                    <input name="mobile_verification_code" id="mobile_verification_code" type="text"
                                        class="form-control " placeholder="Please enter four digit code" value="">
                                    <input name="user_id" id="user_id" type="hidden" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer p-2">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" id="verify-mobile-number-btn" class="btn btn-primary" type="submit">Save
                                changes</button>
                        </div>
                    </form>
                </div>
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
        {{-- <div class="collapse" id="collapseExample"> --}}
        <div class="cendidate_profile_edit">

            <div class="col-md-12">
                <div class="ibox float-e-margins">

                    <div class="cendidata_profile_uper_main">
                        <div id="warningDivPersonalInfo" class="alert alert-danger" style="display: none;">
                            Note: You must have to enter all fields.
                        </div>
                        <div id="warningDivProfilePic" class="alert alert-danger" style="display: none;">
                            You must upload your profile picture (passport size).
                        </div>
                        <div class="ibox-title border_del">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1>Update Profile</h1>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <h2>Are you a SEF Employee?</h2>
                                        </label>
                                        <div class="form-control">

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineRadio1">
                                                    <input class="form-check-input" type="radio" name="sef_employee"
                                                        id="sef_employee_yes" value="1">
                                                    YES</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineRadio2">
                                                    <input class="form-check-input" type="radio" name="sef_employee"
                                                        id="sef_employee_no" value="0"
                                                        {{ $user->sef_employee == '0' ? 'checked' : '' }}>
                                                    NO</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content" id="allow_apply">
                            <form id="update_profile_form" class="m-t" role="form" method="post"
                                enctype="multipart/form-data" action="{{ route('update-candidate-profile') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Complete Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Please Enter Your Complete Name" value="{{ $user->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Complete Urdu Name <span
                                                                class="text-danger"></span></label>
                                                        <input type="text" name="urdu_name"
                                                            class="form-control @error('urdu_name') is-invalid @enderror"
                                                            placeholder="Please Enter Your Urdu Name"
                                                            value="{{ $user->urdu_name }}">
                                                        @error('urdu_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <select class="form-control m-b  @error('status') is-invalid @enderror"
                                                name="gender" id="gender">
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
                                                placeholder="Please Enter Your Father's Name"
                                                value="{{ $user->father_name }}">
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
                                                    class="form-control @error('mobile_number') is-invalid @enderror"
                                                    {{-- data-inputmask="'mask': '923999999999'" --}} placeholder="Please Enter Contact No."
                                                    value="{{ $user->mobile_number }}">
                                                @if ($user->mobile_verified_at == null)
                                                    <span class="input-group-append">
                                                        <button data-mobile_number11="{{ $user->mobile_number }}"
                                                            data-user_id="{{ Auth::id() }}" type="button"
                                                            class="mb-0 btn btn-primary verfiy-mobile-modal-cls">Verify</button>
                                                    </span>
                                                @endif
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
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Please Enter Email Address" value="{{ $user->email }}">
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
                                            <input type="text" name="cnic_number"
                                                class="form-control @error('cnic_number') is-invalid @enderror"
                                                data-inputmask="'mask': '99999-9999999-9'"
                                                placeholder="Please Enter CNIC or Passport No."
                                                value="{{ $user->cnic_number }}">
                                            @error('cnic_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>CNIC / Passport No Expire Date <span
                                                                class="text-danger"></span></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i
                                                                    class="fa fa-calendar"></i></span>
                                                            <input type="text" id="cnic_expire_date" name="cnic_expire_date"
                                                                class="inputgcogroup form-control datepicker @error('cnic_expire_date') is-invalid @enderror"
                                                                placeholder="CNIC / Passport No expire date"
                                                                value="{{ $user->cnic_expire_date }}">
                                                            @error('cnic_expire_date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <small class="text-muted form-text m-b-none text-right">Date Format:
                                                            31/12/2020</small>
                                                    </div>
                                                </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CNIC / Passport Front Side Picture <span
                                                    class="text-danger">*</span></label>
                                            <div class="custom-file">
                                                <input id="cnic_front_img" name="cnic_front_img" type="file"
                                                    class="file_name custom-file-input" data-span="cnic_front">
                                                <label for="logo" class="custom-file-label">CNIC Front Side
                                                    Picture </label>
                                                <input type="text" value="{{ $user->cnic_front_img }}" id="cnicFrontImg"
                                                    hidden>
                                                <span class="invalid-feedback" id="invalid-feedback-cfi" role="alert">
                                                </span>
                                            </div>
                                            @error('cnic_front_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="row">
                                                <div class="col-md-6"><span class="form-text m-b-none text-left"
                                                        style="color: green">Note: Only
                                                        PNG,
                                                        JPEG, JPG
                                                        format is accepted</span></div>
                                                <div class="col-md-6">
                                                    <small class="text-muted form-text m-b-none text-right"><a
                                                            data-toggle="modal" data-target="#CNIC-front-img-modal" href=""
                                                            title="Picture Front Side"><i class="fa fa-plus-circle"></i>
                                                            Preview
                                                            Front Side
                                                            Picture</a></small>
                                                </div>
                                                <span class="form-text text-success m-b-none" id="cnic_front"></span>
                                            </div>
                                            {{-- <span
                                                class="form-text m-b-none text-right">{{ $user->cnic_front_img }}</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CNIC / Passport Back Side Picture <span
                                                    class="text-danger">*</span></label>
                                            <div class="custom-file">
                                                <input id="cnic_back_img" name="cnic_back_img" type="file"
                                                    class="file_name custom-file-input" data-span="cnic_back">
                                                <label for="logo" class="custom-file-label">CNIC Back Side
                                                    Picture </label>
                                                <input type="text" value="{{ $user->cnic_back_img }}" id="cnicBackImg"
                                                    hidden>
                                                <span id="invalid-feedback-cbi" class="invalid-feedback"
                                                    role="alert"></span>
                                            </div>
                                            @error('cnic_back_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="row">
                                                <div class="col-md-6"><span class="form-text m-b-none text-left"
                                                        style="color: green">Note: Only
                                                        PNG,
                                                        JPEG, JPG
                                                        format is accepted</span></div>
                                                <div class="col-md-6"><small
                                                        class="text-muted form-text m-b-none text-right"><a
                                                            data-toggle="modal" data-target="#CNIC-back-img-modal" href=""
                                                            title="Picture Back Side" data-gallery=""><i
                                                                class="fa fa-plus-circle"></i> Preview Back Side
                                                            Picture</a></small></div>

                                                <span class="form-text text-success m-b-none" id="cnic_back"></span>
                                                {{-- <span
                                                class="form-text m-b-none text-right">{{ $user->cnic_back_img }}</span> --}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Place of Birth <span class="text-danger">*</span></label>
                                            <input type="text" name="place_of_birth" id="place_of_birth"
                                                class="form-control @error('place_of_birth') is-invalid @enderror"
                                                placeholder="Please Enter Place of Birth"
                                                value="{{ $user->place_of_birth }}">
                                            @error('place_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Years of Experience <span class="text-danger">*</span></label>
                                            <input type="number" name="total_experience"
                                                class="form-control @error('total_experience') is-invalid @enderror"
                                                placeholder="Please Enter Years of Experience"
                                                value="{{ $user->total_experience }}">
                                            @error('total_experience')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Maritial Status <span class="text-danger">*</span></label>
                                            <select
                                                class="form-control m-b  @error('maritial_status') is-invalid @enderror"
                                                name="maritial_status" id="maritial_status">
                                                <option value="" {{ $user->maritial_status == '' ? 'selected' : '' }}
                                                    disabled>
                                                    Select an Option</option>
                                                <option value="single"
                                                    {{ $user->maritial_status == 'single' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="married"
                                                    {{ $user->maritial_status == 'married' ? 'selected' : '' }}>
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
                                                    placeholder="Date of Birth" value="{{ $user->dob }}">
                                                @error('dob')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <small class="text-muted form-text m-b-none text-right">Date
                                                Format:
                                                31/12/2020</small>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Religion <span class="text-danger">*</span></label>
                                            <select class="form-control m-b  @error('religion') is-invalid @enderror"
                                                name="religion" id="religion">
                                                <option value="" {{ $user->religion == '' ? 'selected' : '' }}>
                                                    Select an option</option>
                                                <option value="Islam" {{ $user->religion == 'Islam' ? 'selected' : '' }}>
                                                    Islam</option>
                                                <option value="Hinduism"
                                                    {{ $user->religion == 'Hinduism' ? 'selected' : '' }}>
                                                    Hinduism
                                                </option>
                                                <option value="Christianity"
                                                    {{ $user->religion == 'Christianity' ? 'selected' : '' }}>
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
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Please Select Country Name <span class="text-danger">*</span></label>
                                            <select
                                                class="load_select form-control  @error('country_id') is-invalid @enderror"
                                                name="country_id" id="country_id" data-target="state_id"
                                                data-url="{{ route('list-states') }}">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $single)
                                                    <option
                                                        {{ $single->id == $user->city->state->country->id ? 'selected' : '' }}
                                                        value="{{ $single->id }}">{{ $single->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Please Select Domicile Province <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control  @error('state_id') is-invalid @enderror"
                                                name="state_id" id="state_id">
                                                @foreach ($states as $single)
                                                    <option
                                                        {{ $single->id == \Auth::user()->state_id ? 'selected' : '' }}
                                                        value="{{ $single->id }}">{{ $single->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('state_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Please Select City Name <span class="text-danger">*</span></label>
                                            <select
                                                class="load_select form-control  @error('city_id') is-invalid @enderror"
                                                name="city_id" id="city_id" data-target="exam_center_id"
                                                data-url="{{ route('list-exam-centers') }}">
                                                @foreach ($cities as $single)
                                                    <option {{ $single->id == $user->city->id ? 'selected' : '' }}
                                                        value="{{ $single->id }}">{{ $single->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Please Select Domicile District <span
                                                    class="text-danger">*</span></label>
                                            <select
                                                class="load_select form-control  @error('district_id') is-invalid @enderror"
                                                name="district_id" id="district_id" data-target="taluka_id"
                                                data-url="{{ route('list-taluka-profile') }}">
                                                <option value="" selected disabled>Select District</option>
                                                @foreach ($districts as $single)
                                                    <option {{ $single->id == $user->district_id ? 'selected' : '' }}
                                                        value="{{ $single->id }}">{{ $single->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <span class="form-text m-b-none" style="color: green">Note: Only Domicile from
                                                Sindh is
                                                acceptable</span>
                                            @error('district_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Please Select Domicile Taluka <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control  @error('taluka_id') is-invalid @enderror"
                                                name="taluka_id" id="taluka_id">
                                                <option value="" selected disabled>Select Taluka</option>
                                                @foreach ($talukas as $single)
                                                    <option {{ $single->id == $user->taluka_id ? 'selected' : '' }}
                                                        value="{{ $single->id }}">{{ $single->name }}
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
                                            <label>Please Enter Domicile Union Council <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control  @error('union_council') is-invalid @enderror"
                                                name="union_council" id="union_council" placeholder="Union Council"
                                                value="{{ $user->union_council }}">
                                            {{-- <option value="" selected disabled>Select Union Council</option>
                                                @foreach ($union_councils as $single)
                                                    <option
                                                        {{ $single->id == $user->union_council ? 'selected' : '' }}
                                                        value="{{ $single->id }}">{{ $single->name }}
                                                    </option>
                                                @endforeach
                                            </select> --}}
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
                                                placeholder="Please Enter Domicile No."
                                                value="{{ $user->domicile_number }}">
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
                                                <label for="domicile" class="custom-file-label">Upload
                                                    Domicile</label>
                                                <input type="text" value="{{ $user->domicile }}" id="domicilePicture"
                                                    hidden>
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
                                                    <span class="form-text m-b-none" style="color: green">Note: Only PNG,
                                                        JPEG, JPG
                                                        format is accepted</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    {{-- <span
                                                        class="form-text text-primary m-b-none text-right">{{ $user->domicile }}</span> --}}
                                                    <small class="text-muted form-text m-b-none text-right"><a
                                                            data-toggle="modal" data-target="#domicile-modal" href=""
                                                            title="Domicile" data-gallery=""><i
                                                                class="fa fa-plus-circle"></i> Preview Domicile
                                                            Picture</a></small>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Current Address / Postal Address<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control  @error('current_address') is-invalid @enderror"
                                                placeholder="Please Enter Current Address" name="current_address"
                                                id="current_address">{{ $user->current_address }}</textarea>
                                            @error('current_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Postal Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control  @error('postal_address') is-invalid @enderror"
                                                placeholder="Please Enter Postal Address" name="postal_address"
                                                id="postal_address">{{ $user->postal_address }}</textarea>
                                            @error('postal_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Permanent Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control  @error('permanent_address') is-invalid @enderror"
                                                placeholder="Please Enter Permanent Address" name="permanent_address"
                                                id="permanent_address">{{ $user->permanent_address }}</textarea>
                                            @error('permanent_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group row text-right">
                                    <div class="col-sm-12 ">
                                        {{-- <button class="btn btn-white btn-sm" type="submit">Cancel</button> --}}
                                        <button class="btn btn-primary btn-sm" id="update_profile_btn" type="submit">Save
                                            Changes</button>
                                        <button data-url="{{ route('documents-upload') }}" id="save_and_next"
                                            class="btn btn-success btn-sm">
                                            Save & Go to Educational Qualification</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ibox-content" id="do_not_allow_apply" style="display: none">
                            <div class="alert alert-danger">
                                You are not eligible for this post.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </div>
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 330px;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo" style="height: 85%;"></div>
                            <button class="btn btn-success crop_image">Crop & Upload Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header_scripts')
    <link href="{{ asset('assets/js/plugins/croppie/croppie.css') }}" rel="stylesheet">
@endpush


@push('footer_scripts')
    <script src="{{ asset('assets/js/plugins/croppie/croppie.js') }}"></script>
    <script>
        $(document).ready(function() {

            $("#dob").flatpickr({
                altInput: true,
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
                maxDate: "today"
            });

        })
    </script>
    <script>
        $(document).ready(function() {

            $('#save_and_next').on('click', function(e) {
                var url = $(this).data('url');
                var profilePictureUrl = $('#profilePictureName').val()
                console.log(profilePictureUrl)
                if (profilePictureUrl) {
                    $("#update_profile_form").submit(function(e) {
                        e.preventDefault(); // avoid to execute the actual submit of the form.
                        var formk = $('#update_profile_form')[0];
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

                            error: function(error) {
                                console.log(typeof(error.responseJSON.errors))
                                for (const key in error.responseJSON.errors) {
                                    console.log(key)
                                    $(`#${key}`).addClass("is-invalid");
                                }
                                document.getElementById('warningDivPersonalInfo').style
                                    .display = "block";

                            }
                        });

                    });
                } else {
                    e.preventDefault()
                    document.getElementById('warningDivProfilePic').style
                        .display = "block";
                }

            })

            $("#update_profile_btn").on('click', function(e) {
                var profilePictureUrl = $('#profilePictureName').val()
                var domicile = $('#domicilePicture').val()
                var cnicBackImg = $('#cnicBackImg').val()
                var cnicFrontImg = $('#cnicFrontImg').val()
                console.log(profilePictureUrl, cnicFrontImg, cnicBackImg, domicile)
                if (!profilePictureUrl) {
                    e.preventDefault()
                    document.getElementById('warningDivProfilePic').style
                        .display = "block";
                }
                // if (!domicile) {
                //     e.preventDefault()
                //     $("#domicile").addClass("is-invalid");
                //     $('#invalid-feedback-domicile').html(`<strong>
            //                     This Field cannot be empty
            //                     </strong>`)
                //     document.getElementById('warningDivPersonalInfo').style
                //         .display = "block";
                // }
                // if (!cnicBackImg) {
                //     e.preventDefault()
                //     $("#cnic_back_img").addClass("is-invalid");
                //     $('#invalid-feedback-cbi').html(`<strong>
            //                     This Field cannot be empty
            //                     </strong>`)
                //     document.getElementById('warningDivPersonalInfo').style
                //         .display = "block";
                // }
                // if (!cnicFrontImg) {
                //     e.preventDefault()
                //     $("#cnic_front_img").addClass("is-invalid");
                //     $('#invalid-feedback-cfi').html(`<strong>
            //                     This Field cannot be empty
            //                     </strong>`);
                //     document.getElementById('warningDivPersonalInfo').style
                //         .display = "block";
                // }

            });

            $('#edit_icon').on('click', function(e) {
                $("#upload_image").trigger("click");

            });

            if ($("#sef_employee_yes").prop("checked") == true) {
                document.getElementById("allow_apply").style.display = "none";
                document.getElementById('do_not_allow_apply').style.display = "block";
            } else {
                $("#sef_employee_no").prop("checked", true)
                document.getElementById("allow_apply").style.display = "block";
                document.getElementById('do_not_allow_apply').style.display = "none";
            }
            $(document).on('click', '#sef_employee_yes', function(e) {
                document.getElementById("allow_apply").style.display = "none";
                document.getElementById('do_not_allow_apply').style.display = "block";
            })
            $(document).on('click', '#sef_employee_no', function(e) {
                document.getElementById("allow_apply").style.display = "block";
                document.getElementById('do_not_allow_apply').style.display = "none";
            })

            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'square' //circle
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });

            $('#upload_image').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });

            $('.crop_image').click(function(event) {
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    $.ajax({
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        url: "{{ route('profile-picture') }}",
                        type: "POST",
                        data: {
                            "image": response
                        },
                        success: function(data) {
                            console.log(data);
                            $('#uploadimageModal').modal('hide');
                            $('.user-image').attr('src', data
                                .profile_picture);
                            $('#user_profile_pic').attr('src', data
                                .profile_picture);
                            $('#profilePictureName').val(data
                                .profile_picture)
                        },
                        beforeSend: function() {
                            $('#profile-pic-attr').hide().html('');
                            showLoading();
                        },
                        complete: function() {
                            hideLoading();
                        }
                    });
                })
            });

            $(document).on('click', '.verfiy-mobile-modal-cls', function(e) {
                e.preventDefault();

                var user_id = $(this).data('user_id');
                var mobile_number = $('#mobile_number').val();
                if (phonenumber(mobile_number)) {
                    $.ajax({
                        url: '{{ route('sms-verification') }}',
                        type: "POST",
                        data: {
                            user_id: user_id,
                            mobile_number: mobile_number
                        },
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        cache: false,
                        success: function(resp) {
                            //if resonpnse is succfully then show the model
                            // $('#verify-mobile-number-modal').html(html);
                            $('#verify-mobile-number-modal #user_id').val(user_id);
                            $('#verify-mobile-number-modal #number_string').text(
                                'Please enter the 4 digit code that send to this ',
                                mobile_number);

                            $('#verify-mobile-number-modal').modal('show');
                        },
                        error: function() {

                        },
                        beforeSend: function() {

                        },
                        complete: function() {

                        }
                    });
                }
            });

            $(document).on('click', '#verify-mobile-number-btn', function(e) {
                e.preventDefault();

                $.ajax({

                    url: '{{ route('update-mobile-verification-status') }}',
                    type: "POST",
                    data: $('#form-verify-mobile-number').serializeArray(),
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(resp) {
                        if (resp.status == 'success') {
                            toastr.success(resp.msg);
                            location.reload();
                        }
                        if (resp.status == 'error') {
                            toastr.error(resp.msg);
                        }
                    },
                    error: function() {
                        toastr.error(resp.msg);
                    },
                    beforeSend: function() {

                    },
                    complete: function(resp) {
                        if (resp.status == 'success') {
                            $('#verify-mobile-number-modal').modal('hide');
                        }
                    }
                });
            });

            function phonenumber(inputtxt) {
                var phoneno = /^\d{12}$/;
                if (inputtxt.match(phoneno)) {
                    return true;
                } else {
                    alert("Number is invalid");
                    return false;
                }
            }

        });
    </script>
@endpush
