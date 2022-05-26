<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Diploma / Certifications</h5>
            </div>
            <div class="ibox-content">
                <form enctype='multipart/form-data' role="form" id="add_student_certificate_form"
                    action="{{ route('user-certificates.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Certificate / Professional Experiences <span
                                        class="text-danger">*</span></label>
                                <input value="{{ old('name') }}" type="text" placeholder="Enter Certificate Name"
                                    name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                    aria-required="true">
                                <span id="invalid-feedback-name" class="invalid-feedback" role="alert"></span>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Duration <span class="text-danger">*</span></label>
                                <input value="{{ old('duration') }}" type="text" placeholder="Enter Duration"
                                    name="duration" id="duration"
                                    class="form-control @error('duration') is-invalid @enderror" aria-required="true">
                                <span id="invalid-feedback-duration" class="invalid-feedback" role="alert"></span>
                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date <span class="text-danger"></span></label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" id="start_date" name="start_date"
                                        class="inputgcogroup form-control @error('start_date') is-invalid @enderror"
                                        placeholder="Start Date" value="{{ $user->start_date }}">
                                    <span id="invalid-feedback-sdate" class="invalid-feedback" role="alert"></span>
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Date <span class="text-danger"></span></label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" id="end_date" name="end_date"
                                        class="inputgcogroup form-control @error('end_date') is-invalid @enderror"
                                        placeholder="End Date" value="{{ $user->end_date }}">
                                    <span id="invalid-feedback-edate" class="invalid-feedback" role="alert"></span>
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Institute Name <span class="text-danger">*</span></label>
                                <input value="{{ old('institute_name') }}" type="text"
                                    placeholder="Enter Institute Name" name="institute_name" id="institute_name"
                                    class="form-control @error('institute_name') is-invalid @enderror"
                                    aria-required="true">
                                <span id="invalid-feedback-iname" class="invalid-feedback" role="alert"></span>

                                @error('institute_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Diploma Certificate <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input name="document" id="document" type="file"
                                        class="file_name custom-file-input @error('document') is-invalid @enderror"
                                        data-span="file_name">
                                    <label for="document" class="custom-file-label">Upload Document</label>
                                </div>
                                <span id="invalid-feedback-document" class="invalid-feedback" role="alert"></span>
                                @error('document')
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
                            <a href="{{ route('user-experiences.index') }}" class="btn btn-success btn-sm">
                                Save & Go To Work Experience</a>
                            {{-- <button data-url="{{ route('user-experiences.index') }}" id="save_and_next"
                                class="btn btn-success btn-sm">
                                Save & Go To Next Step</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
