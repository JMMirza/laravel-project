 @foreach ($jobs as $job)
     <div class="col-12 p-0">
         <div class="job_card_main">
             <div class="row">
                 <div class="col-md-3">
                     <div id="job_logo">
                         <img src="{{ asset('assets/img/pdlc_logo.png') }}" alt="logo" style="width: 50%">
                     </div>
                 </div>
                 <div class="job_card_main_txt col-md-9">
                     <div class="row">
                         <div class="col-md-8">
                             <h3>
                                 {{ $job->job_title }}
                             </h3>
                         </div>
                         <div class="col-md-4">
                             <p class="light_heading">
                                 Deadline: {{ $job->job_valid_till->format('d M, Y') }}
                             </p>
                         </div>
                         <div class="col-md-12">
                             {!! $job->job_description !!}
                         </div>

                         <div class="col-md-4 mt-4">
                             <a target="_blank" href="{{ route('how-to-apply') }}" class="btn btn-info btn-block"
                                 id="howToApply">
                                 HOW TO APPLY
                             </a>
                         </div>

                         @if (in_array($job->id, $user_applied_jobs->toArray()))
                             <div class="col-md-4 mt-4">
                                 <button type="button" class="applied_btn px-3"
                                     data-url="{{ route('load-job-prefrences') }}"
                                     data-target="#jobApplyPrefenceFormModal" value="{{ $job->id }}"
                                     id="apply_now{{ $job->id }}">
                                     <i class="fa fa-check"></i> Preferences
                                 </button>
                             </div>
                         @else
                             <div class="col-md-4 mt-4">
                                 <a href="{{ route('update-profile') }}" class="btn btn-block not_eligible px-3"
                                     style="text-decoration: none">
                                     Apply Now
                                 </a>
                             </div>
                         @endif

                         <div class="col-md-4 mt-4">
                             <a target="_blank" href="{{ route('download-add', $job->job_add_image) }}"
                                 id="howToApply" class="btn btn-info btn-block">
                                 DOWNLOAD SCHOOL LIST
                             </a>
                         </div>
                     </div>
                 </div>
             </div>

         </div>

     </div>
 @endforeach
