<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Work Experiences</h5>
            </div>
            <div class="ibox-content">
                <form enctype='multipart/form-data' role="form" action="{{ route('user-experiences.store') }}"
                    id="add_student_experience_form" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Organization Name <span class="text-danger">*</span></label>
                                <input value="{{ old('organization_name') }}" type="text"
                                    placeholder="Enter Organization Name" name="organization_name"
                                    id="organization_name"
                                    class="form-control @error('organization_name') is-invalid @enderror"
                                    aria-required="true">
                                <span id="invalid-feedback-oname" class="invalid-feedback" role="alert"></span>
                                @error('organization_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Designation <span class="text-danger">*</span></label>
                                <input value="{{ old('designation') }}" type="text" placeholder="Enter Designation"
                                    name="designation" id="designation"
                                    class="form-control @error('designation') is-invalid @enderror"
                                    aria-required="true">
                                <span id="invalid-feedback-designation" class="invalid-feedback" role="alert"></span>
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date From <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input name="date_from" id="date_from" type="text"
                                        class="form-control  @error('date_from') is-invalid @enderror"
                                        placeholder="Date of Joining" value="{{ old('date_from') }}">
                                    <span id="invalid-feedback-datef" class="invalid-feedback" role="alert"></span>
                                    @error('date_from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-2" style="padding: 30px 17px">

                                    <div class="form-check">

                                        <strong><input class="form-check-input" type="checkbox" value="1" id="present"
                                                name="present">
                                            <label class="form-check-label" for="present">
                                                Present
                                            </label></strong>

                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Date To </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="date_to" id="date_to" type="text"
                                                class="form-control  @error('date_to') is-invalid @enderror"
                                                placeholder="Date of Leaving" value="{{ old('date_to') }}">
                                            <span id="invalid-feedback-datet" class="invalid-feedback"
                                                role="alert"></span>
                                            @error('date_to')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Experience Letter</label>
                                <div class="custom-file">
                                    <input name="experience_letter" id="experience_letter" type="file"
                                        class="file_name custom-file-input @error('experience_letter') is-invalid @enderror"
                                        data-span="file_name">
                                    <label for="logo" class="custom-file-label">Upload Experience Letter</label>
                                </div>
                                @error('experience_letter')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-text text-success m-b-none" id="file_name"></span>
                                <span class="form-text m-b-none" style="color: green">Note: Only PDF
                                    format and size must be less than 1 MB</span>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                            <button class="btn btn-primary btn-sm" type="submit">Add Record</button>
                            <a href="{{ route('job-preferences.index') }}" class="btn btn-success btn-sm">
                                Save & Go to Job Preferences</a>
                            {{-- <button data-url="{{ route('candidate-dashboard') }}" id="save_and_next"
                                class="btn btn-success btn-sm">
                                Save & Proceed to Job Application</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
