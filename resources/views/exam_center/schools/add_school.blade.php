<div class="wrapper wrapper-content pb-0">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add New School</h5>
                </div>
                <div class="ibox-content pb-1">
                    <form class="m-t" role="form" method="post" action="{{ route('schools.store') }}"
                        id="form_exam_center">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>School Name <span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Please Enter School Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Union Council <span class="text-danger">*</span></label>
                                    <select class="form-control  @error('union_council_id') is-invalid @enderror"
                                        name="union_council_id" id="union_council_id">
                                        <option value="" selected disabled>Select Union Council</option>
                                        @foreach ($union_councils as $single)
                                            <option value="{{ $single->id }}">{{ $single->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('union_council_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address <span class="text-danger"></span></label>
                                    <textarea class="form-control  @error('address') is-invalid @enderror" placeholder="Please Enter School Address"
                                        name="address" id="address">{{ old('address') }}</textarea>
                                    @error('address')
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
