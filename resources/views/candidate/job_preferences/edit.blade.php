<form role="form" id="job_preferences_form" action="{{ route('job-preferences.update', $job_preference->id) }}"
    method="post">
    @csrf
    @method('PUT')
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
                        <option {{ $job_preference->district_id == $single->id ? 'selected' : '' }}
                            value="{{ $single->id }}">{{ $single->name }}</option>
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
                    @foreach ($talukas as $single)
                        <option {{ $job_preference->taluka_id == $single->id ? 'selected' : '' }}
                            value="{{ $single->id }}">{{ $single->name }}</option>
                    @endforeach
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
                    @foreach ($villages as $single)
                        <option {{ $job_preference->village_id == $single->id ? 'selected' : '' }}
                            value="{{ $single->id }}">{{ $single->name }}</option>
                    @endforeach
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
                    @foreach ($union_councils as $single)
                        <option {{ $job_preference->union_council_id == $single->id ? 'selected' : '' }}
                            value="{{ $single->id }}">{{ $single->name }}</option>
                    @endforeach
                </select>
                @error('union_council')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="school_id">School Name </label>
                <select data-placeholder="Select School" class="form-control" name="school_id" id="school_id">
                    <option value="" disabled>Select a School</option>
                    @foreach ($schools as $single)
                        <option {{ $job_preference->school_id == $single->id ? 'selected' : '' }}
                            value="{{ $single->id }}">{{ $single->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary btn-xs text-white float-right m-2" type="submit">
                    <i class="fa fa-solid fa-plus"></i>&nbsp; Update Record &nbsp;
                </button>
            </div>
        </div>
    </div>
</form>
