<div class="wrapper wrapper-content pb-0">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Taluka</h5>
                </div>
                <div class="ibox-content pb-1">
                    <form class="m-t" role="form" method="post"
                        action="{{ route('talukas.update', $taluka->id) }}" id="form_exam_center">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Taluka Name <span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Please Enter Taluka Name" value="{{ $taluka->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Abbreviation</label>
                                    <input name="abbreviation" id="abbreviation" type="abbreviation"
                                        class="form-control @error('abbreviation') is-invalid @enderror"
                                        placeholder="Please Enter Abbreviation" value="{{ $taluka->abbreviation }}">
                                    @error('abbreviation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District <span class="text-danger">*</span></label>
                                    <select class="form-control  @error('district_id') is-invalid @enderror"
                                        name="district_id" id="district_id">
                                        <option value="" selected disabled>Select District</option>
                                        @foreach ($districts as $single)
                                            <option value="{{ $single->id }}"
                                                {{ $single->id == $taluka->district_id ? 'selected' : '' }}>
                                                {{ $single->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
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
