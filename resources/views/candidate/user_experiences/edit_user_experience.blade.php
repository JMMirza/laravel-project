<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Work Experiences</h5>
            </div>
            <div class="ibox-content">
                <form enctype='multipart/form-data' role="form"
                    action="{{ route('user-experiences.update', $userExperience->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Organization Name <span class="text-danger">*</span></label>
                                <input value="{{ $userExperience->organization_name }}" type="text"
                                    placeholder="Enter Organization Name" name="organization_name"
                                    id="organization_name"
                                    class="form-control @error('organization_name') is-invalid @enderror"
                                    aria-required="true">
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
                                <input value="{{ $userExperience->designation }}" type="text"
                                    placeholder="Enter Designation" name="designation" id="designation"
                                    class="form-control @error('designation') is-invalid @enderror"
                                    aria-required="true">
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
                                        placeholder="Date of Joining" value="{{ $userExperience->date_from }}">
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
                                                name="present" {{ $userExperience->present == 1 ? 'checked' : '' }}>
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
                                                placeholder="Date of Leaving" value="{{ $userExperience->date_to }}">
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
                            <a href="{{ route('user-experiences.index') }}" class="btn btn-white btn-sm">Cancel</a>
                            <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                            {{-- <a href="{{ route('candidate-dashboard') }}" class="btn btn-success btn-sm">
                                Apply Job Application</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
