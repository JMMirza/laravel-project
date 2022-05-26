<div class="modal fade" id="candidateFormModal" tabindex="-1" aria-labelledby="candidateFormModalLabel"
    aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="candidateFormModalLabel">Candidate_ID: {{ $user->user->id }} </h3>
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="candidateFormModalLabel">Candidate_Name: {{ $user->user->name }} </h4>
            </div>
            <div class="modal-body">
                <p class="">
                    <label class="mr-3"><i class="fa fa-clipboard"></i>&nbsp;&nbsp;&nbsp;
                        {{ $user->shortlisted_by }}
                    </label>

                </p>
                <p class="">
                    <label class="mr-3"><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;
                        {{ $user->shortlisted_at }}
                    </label>

                </p>

            </div>
        </div>
    </div>
</div>
