<div class="modal fade" id="candidateFormModal" tabindex="-1" aria-labelledby="candidateFormModalLabel" role="dialog"
    aria-modal="true" style="display: block; padding-right: 16px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <h3 class="modal-title" id="candidateFormModalLabel">Candidate_ID: {{ $data->user->id }} </h3>
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="candidateFormModalLabel">Candidate_Name: {{ $data->user->name }} </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <select class="load_select form-control" name="modal_country_id" id="modal_country_id"
                                data-target="modal_state_id" data-url="{{ route('list-states') }}">
                                <option value="">Select Country</option>
                                @foreach ($country as $single)
                                    <option value="{{ $single->id }}">{{ $single->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>State <span class="text-danger">*</span></label>
                            <select class="load_select form-control" name="modal_state_id" id="modal_state_id"
                                data-target="modal_city_id" data-url="{{ route('list-cities') }}">
                                <option value="">Select Province</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>City <span class="text-danger">*</span></label>
                            <select class="load_select form-control" name="modal_city_id" id="modal_city_id"
                                data-target="modal_exam_center_id" data-url="{{ route('list-exam-centers') }}">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Exam Center <span class="text-danger">*</span></label>
                            <select class="form-control" name="modal_exam_center_id" id="modal_exam_center_id">
                                <option value="">Select Exam Center</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
