<div class="wrapper wrapper-content pb-0">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add New Skill</h5>
                </div>
                <div class="ibox-content pb-1">
                    <form class="m-t" role="form" method="post" action="{{ route('skills.store') }}"
                        id="form_exams">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Skill Name <span class="text-danger">*</span></label>
                                    <input name="skill_name" id="skill_name" type="text"
                                        class="form-control @error('skill_name') is-invalid @enderror"
                                        placeholder="Please Enter Job Name" value="{{ old('skill_name') }}" required>
                                    @error('skill_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Abbreviation <span class="text-danger">*</span></label>
                                    <input name="abbreviation" id="abbreviation" type="text"
                                        class="form-control @error('abbreviation') is-invalid @enderror"
                                        placeholder="Please Enter Abbreviation" value="{{ old('abbreviation') }}">
                                    @error('abbreviation')
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
                                <button class="btn btn-white btn-sm">Cancel</button>
                                <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
