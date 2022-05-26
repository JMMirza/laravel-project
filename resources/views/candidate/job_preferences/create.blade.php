<form enctype='multipart/form-data' role="form" id="job_preferences_form"
    action="{{ route('job-preferences.store') }}" method="post">
    @csrf
    <input type="hidden" class="user_id" value="{{ Auth::user()->id }}" name="user_id">
    @if (isset($job_id))
        <input type="hidden" class="job_application_id" value="{{ $job_id }}" name="job_application_id">
    @endif
    @if (isset($user_job_prefer))
        <input type="hidden" class="job_prefrences" value="{{ $user_job_prefer }}" name="job_prefrences">
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>District Name </label>
                <select class="load_select form-control  @error('district_id') is-invalid @enderror" name="district_id"
                    id="district_id" data-target="taluka_id" data-url="{{ route('list-talukas') }}">
                    <option value="" selected disabled>Select District</option>
                    @foreach ($districts as $single)
                        <option value="{{ $single->id }}">{{ $single->name }}</option>
                    @endforeach
                </select>
                @error('district_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Taluka Name </label>
                <select class="load_select form-control  @error('taluka_id') is-invalid @enderror" name="taluka_id"
                    id="taluka_id" data-target="village_id" data-url="{{ route('list-villages') }}">
                    <option value="" selected disabled>Select Taluka</option>
                </select>
                @error('taluka_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Village Name </label>
                <select class="load_select form-control  @error('village_id') is-invalid @enderror" name="village_id"
                    id="village_id" data-target="union_council_id" data-url="{{ route('list-union-councils') }}">
                    <option value="" selected disabled>Select Villages</option>
                </select>
                @error('village_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Union Council</label>
                <select class="load_select form-control  @error('union_council_id') is-invalid @enderror"
                    name="union_council_id" id="union_council_id" data-target="school_id"
                    data-url="{{ route('list-schools') }}">
                    <option value="" selected disabled>Select Union Council</option>
                </select>
                @error('union_council_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="school_id">School Name </label>
                <select class="form-control @error('school_id') is-invalid @enderror" name="school_id" id="school_id">
                    <option value="" selected disabled>Select a School</option>
                </select>
                @error('school_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            @if (isset($limit) && $limit == 3)
                <button class="btn btn-primary btn-xs text-white float-right m-2" disabled>
                    You have added all Preferences &nbsp;
                </button>
            @else
                <button class="btn btn-primary btn-xs text-white float-right m-2" type="submit">
                    <i class="fa fa-solid fa-plus"></i>&nbsp; Add Record &nbsp;
                </button>
            @endif
        </div>
    </div>
</form>
