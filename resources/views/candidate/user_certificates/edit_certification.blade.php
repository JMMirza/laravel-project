<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Diploma/Certifications</h5>
            </div>
            <div class="ibox-content">
                <form enctype='multipart/form-data' role="form" id="add_student_docs_form"
                    action="{{ route('user-certificates.update', $userCertificate->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Certificate / Professional Experiences <span
                                        class="text-danger">*</span></label>
                                <input value="{{ $userCertificate->name }}" type="text"
                                    placeholder="Enter Certificate Name" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" aria-required="true">
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
                                <input value="{{ $userCertificate->duration }}" type="text"
                                    placeholder="Enter Duration" name="duration" id="duration"
                                    class="form-control @error('duration') is-invalid @enderror" aria-required="true">

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
                                        placeholder="Start Date" value="{{ $userCertificate->start_date }}">
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
                                        placeholder="End Date" value="{{ $userCertificate->end_date }}">
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
                                <input value="{{ $userCertificate->institute_name }}" type="text"
                                    placeholder="Enter Institute Name" name="institute_name" id="institute_name"
                                    class="form-control @error('institute_name') is-invalid @enderror"
                                    aria-required="true">

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
                            <a href="{{ route('user-certificates.index') }}" class="btn btn-white btn-sm">Cancel</a>
                            <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                            {{-- <a href="{{ route('user-experiences.index') }}" class="btn btn-success btn-sm">
                                Next</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
