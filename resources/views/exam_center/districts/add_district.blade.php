<div class="wrapper wrapper-content pb-0">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add New District</h5>
                </div>
                <div class="ibox-content pb-1">
                    <form class="m-t" role="form" method="post" action="{{ route('districts.store') }}"
                        id="form_exam_center">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>District Name <span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Please Enter District Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Abbreviation</label>
                                    <input name="abbreviation" id="abbreviation" type="abbreviation"
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

                        <div class="form-group row text-right">
                            <div class="col-sm-12 ">
                                <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
