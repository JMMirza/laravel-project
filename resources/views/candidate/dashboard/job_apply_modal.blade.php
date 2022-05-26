<div class="modal inmodal" id="jobApplyFormModal" tabindex="-1" aria-labelledby="jobApplyFormModalLabel" role="dialog"
    aria-modal="true" style="display: block; padding-right: 16px;">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">

                <form action="{{ route('job-applications.store') }}" method="POST" class="form-control border-0">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="modal-title" id="jobApplyFormModalLabel">
                                {{ $job->id }}- {{ $job->job_title }}
                            </h3>

                        </div>
                        @if (count($status) != 0)
                            <div class="col-md-2">
                                <button class="btn btn-success btn-xs text-white float-right" disabled type="button">
                                    <i class="fa fa-check"></i>&nbsp; Applied &nbsp;
                                </button>
                            </div>
                        @endif
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                    </div>

                </form>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="job_card_main">
                                <div class="col-md-12 p-0">
                                    <p class="job_dark_content decription pt-3">
                                        {{ $job->job_description }}
                                    </p>
                                </div>
                                <div class="col-md-12 p-0">
                                    <p class="light_heading">CONTACT</p>
                                    <p class="job_dark_content"> {{ $job->job_email }}</p>
                                </div>
                                <div class="row px-3">
                                    <div class="col-md-12 p-0">
                                        <p class="light_heading">LOCATION</p>
                                    </div>
                                    <div class="col-md-6 pt-1">
                                        <p class="location_tag">{{ $job->state->name }}</p>
                                    </div>
                                    <div class="col-md-6 pt-1">
                                        <p class="location_tag">{{ $job->city_names }}</p>
                                    </div>
                                </div>
                                <div class="requirements_outer px-3">
                                    <div class="row ">
                                        <div class="col-md-6 requirements_txt_left">
                                            <p class="requirements_txt text-center pt-3">
                                                {{ $job->job_education }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="requirements_txt text-center pt-3">
                                                <span>{{ $job->job_max_age }}</span> is the age <br>limit
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
