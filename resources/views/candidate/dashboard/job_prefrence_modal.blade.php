<div class="modal inmodal" id="jobApplyPrefenceFormModal" tabindex="-1" aria-labelledby="jobApplyFormModalLabel"
    role="dialog" aria-modal="true" style="display: none; padding-right: 16px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInY">

            <div class="modal-header">

                <h3 class="modal-title" id="jobApplyFormModalLabel">
                    Job Preferences
                </h3>
            </div>
            <div class="modal-body">
                <input type="hidden" class="user_id" value="{{ Auth::user()->id }}" name="user_id">
                @if (isset($job_id))
                    <input type="hidden" class="job_application_id" value="{{ $job_id }}"
                        name="job_application_id">
                @endif
                @if (isset($user_job_prefer))
                    <input type="hidden" class="job_prefrences" value="{{ $user_job_prefer }}" name="job_prefrences">
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div id="warningDivShow" class="alert alert-danger" style="display: none">
                            You have to add 3 Preferences.
                        </div>
                        <table id="jobPrefrences" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>District</th>
                                    <th>Taluka</th>
                                    <th>Village</th>
                                    <th>Union Council</th>
                                    <th>School Name</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($user_job_prefer))
                                    @foreach ($user_job_prefer as $key => $job_preference)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td class='district_id'>{{ $job_preference->district->name }}
                                            </td>
                                            <td class='taluka_id'>{{ $job_preference->taluka->name }}</td>
                                            <td class='village_id'>{{ $job_preference->village->name }}</td>
                                            <td class='union_council_id'>
                                                {{ $job_preference->union_council->name }}
                                            </td>
                                            <td class='school_id'>{{ $job_preference->school->name }}</td>
                                            {{-- <td class=''></td> --}}
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
