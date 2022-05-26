<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-10">
                        <h3>EDIT JOB</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('job-candidate-info', $job_list->id) }}"
                            class="btn btn-primary btn-icon waves-effect waves-light mr-1" style="float: right">
                            Candidates
                        </a>
                    </div>
                </div>


            </div>
            <div class="ibox-content pb-1">
                <form enctype='multipart/form-data' class="m-t" role="form" method="post"
                    action="{{ route('job-lists.update', $job_list->id) }}" id="form_exams">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Job Title <span class="text-danger">*</span></label>
                                <input name="job_title" id="job_title" type="text"
                                    class="form-control @error('job_title') is-invalid @enderror"
                                    placeholder="Please Enter Job Name" value="{{ $job_list->job_title }}" required>
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Job Education <span class="text-danger">*</span></label>
                                <input name="job_education" id="job_education" type="text"
                                    class="form-control @error('job_education') is-invalid @enderror"
                                    placeholder="Please Enter Job Education" value="{{ $job_list->job_education }}"
                                    required>
                                @error('job_education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Job Required Age <span class="text-danger">*</span></label>
                                <input name="job_max_age" id="job_max_age" type="number"
                                    class="form-control @error('job_max_age') is-invalid @enderror"
                                    placeholder="Please Enter Job Age" value="{{ $job_list->job_max_age }}" required>
                                @error('job_max_age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Job Selection Criteria <span class="text-danger">*</span></label>
                                <input name="job_selection_criteria" id="job_selection_criteria" type="text"
                                    class="form-control @error('job_selection_criteria') is-invalid @enderror"
                                    placeholder="Please Enter Selection Criteria"
                                    value="{{ $job_list->job_selection_criteria }}" required>
                                @error('job_selection_criteria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Job Email <span class="text-danger">*</span></label>
                                <input name="job_email" id="job_email" type="email"
                                    class="form-control @error('job_email') is-invalid @enderror"
                                    placeholder="Please Enter Job Email" value="{{ $job_list->job_email }}" required>
                                @error('job_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Job Postal Address <span class="text-danger">*</span></label>
                                <input name="job_postal_address" id="job_postal_address" type="text"
                                    class="form-control @error('job_postal_address') is-invalid @enderror"
                                    placeholder="Please Enter Job Postal Address"
                                    value="{{ $job_list->job_postal_address }}" required>
                                @error('job_postal_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="load_select_city form-control" name="state_id" id="state_id"
                                    data-target="city_id" data-url="{{ route('list-cities') }}">
                                    <option value="" selected disabled>Select State</option>
                                    @foreach ($states as $single)
                                        <option value="{{ $single->id }}"
                                            {{ $single->id == $job_list->state_id ? 'selected' : '' }}>
                                            {{ $single->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>City <span class="text-danger">*</span></label>
                                        <select class="form-control" name="city_id" id="city_id">
                                            <option value="" selected disabled>Select City</option>
                                            @foreach ($cities as $single)
                                                <option value="{{ $single->id }}"
                                                    {{ $single->id == $job_list->city_id ? 'selected' : '' }}>
                                                    {{ $single->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City <span class="text-danger">*</span></label>
                                <select
                                    class="form-control js-example-basic-single @error('city_names') is-invalid @enderror"
                                    name="city_names[]" id="city_id" multiple="multiple">
                                    <option value="" disabled>Select City</option>
                                    @foreach ($cities as $single)
                                        <option value="{{ $single->name }}"
                                            {{ in_array($single->name, $city_names) ? 'selected' : '' }}>
                                            {{ $single->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_names')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Job Apply Before <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input name="job_valid_till" id="job_valid_till" type="text"
                                        class="form-control  @error('job_valid_till') is-invalid @enderror"
                                        placeholder="Select Job Valid Till" value="{{ $job_list->job_valid_till }}">
                                    @error('job_valid_till')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Job Advertisement Image <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input name="job_add_image" id="job_add_image" type="file"
                                        class="custom-file-input @error('job_add_image') is-invalid @enderror">
                                    <label for="job_add_image" class="custom-file-label">Upload Document</label>
                                </div>
                                @error('job_add_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-text text-danger m-b-none">Note: Only PDF, PNG, JPEG, JPG
                                    format and Max size 2 MB</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Descriptions <span class="text-danger">*</span></label>
                                <div class="mail-text h-200">
                                    <textarea @error('job_description') is-invalid @enderror" placeholder="Please Enter Exam Description"
                                        name="job_description" id="job_description"
                                        class="summernote">{{ $job_list->job_description }}</textarea>
                                    <div class="clearfix"></div>
                                </div>

                                @error('job_description')
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
                            <a href="{{ route('job-lists.index') }}" class="btn btn-white btn-sm">Cancel</a>
                            <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
