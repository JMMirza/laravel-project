<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Educational Qualification</h5>
            </div>
            <div class="ibox-content">
                <form enctype='multipart/form-data' role="form" id="add_student_docs_form"
                    action="{{ route('update-educational-document', $candidateDocument->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Degree / Certificate <span class="text-danger">*</span></label>
                                <select name="academic_achievement" id="academic_achievement"
                                    class="form-control @error('academic_achievement') is-invalid @enderror"
                                    aria-required="true">
                                    <option {{ $candidateDocument->academic_achievement == '' ? 'selected' : '' }}
                                        value="" selected disabled>
                                        Please Select </option>
                                    <option {{ $candidateDocument->academic_achievement == 'phd' ? 'selected' : '' }}
                                        value="phd">PhD</option>
                                    <option
                                        {{ $candidateDocument->academic_achievement == 'masters' ? 'selected' : '' }}
                                        value="masters">Masters</option>
                                    <option
                                        {{ $candidateDocument->academic_achievement == 'bachelors' ? 'selected' : '' }}
                                        value="bachelors">Bachelors</option>
                                    <option
                                        {{ $candidateDocument->academic_achievement == 'intermediate' ? 'selected' : '' }}
                                        value="intermediate">Intermediate / Equivalent</option>
                                    <option
                                        {{ $candidateDocument->academic_achievement == 'martic' ? 'selected' : '' }}
                                        value="martic">Martic / Equivalent</option>
                                </select>
                                @error('academic_achievement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4" id="phdSubjectsDiv"
                            @if ($candidateDocument->academic_achievement == 'phd') style="display: block" @else style="display: none" @endif>
                            <div class="form-group">
                                <label>Major Subject <span class="text-danger">*</span></label>
                                <input value="{{ $candidateDocument->major_subject }}" type="text"
                                    placeholder="Enter Subject Name" name="major_subject" id="major_subject"
                                    class="form-control @error('major_subject') is-invalid @enderror"
                                    aria-required="true">
                                <span id="invalid-feedback-institute" class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                                @error('major_subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="bachelorsSubjectsDiv" class="col-md-8"
                            @if ($candidateDocument->academic_achievement == 'bachelors') style="display: block" @else style="display: none" @endif>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Program Name <span class="text-danger">*</span></label>
                                        <select name="program_name" id="program_name"
                                            class="form-control @error('program_name') is-invalid @enderror"
                                            aria-required="true">
                                            <option {{ $candidateDocument->program_name == '' ? 'selected' : '' }}
                                                value="" selected disabled>
                                                Please Select </option>
                                            <option
                                                {{ $candidateDocument->program_name == 'BSc (Hons)' ? 'selected' : '' }}
                                                value="BSc (Hons)">
                                                BSc (Hons)</option>
                                            <option {{ $candidateDocument->program_name == 'BSc' ? 'selected' : '' }}
                                                value="BSc">
                                                BSc</option>
                                            <option
                                                {{ $candidateDocument->program_name == 'BS (Hons)' ? 'selected' : '' }}
                                                value="BS (Hons)">BS (Hons)</option>
                                            <option {{ $candidateDocument->program_name == 'BS' ? 'selected' : '' }}
                                                value="BS">BS
                                            </option>
                                            <option
                                                {{ $candidateDocument->program_name == 'BBA (Hons)' ? 'selected' : '' }}
                                                value="BBA (Hons)">
                                                BBA (Hons)</option>
                                            <option {{ $candidateDocument->program_name == 'BBA' ? 'selected' : '' }}
                                                value="BBA">
                                                BBA</option>
                                            <option
                                                {{ $candidateDocument->program_name == 'BA (Hons)' ? 'selected' : '' }}
                                                value="BA (Hons)">BA (Hons)</option>
                                            <option {{ $candidateDocument->program_name == 'BA' ? 'selected' : '' }}
                                                value="BA">BA
                                            </option>
                                            <option
                                                {{ $candidateDocument->program_name == 'BBIT' ? 'selected' : '' }}
                                                value="BBIT">BBIT</option>
                                            <option
                                                {{ $candidateDocument->program_name == 'B.Ed (Hons)' ? 'selected' : '' }}
                                                value="B.Ed (Hons)">B.Ed (Hons)</option>
                                            <option
                                                {{ $candidateDocument->program_name == 'B.Ed' ? 'selected' : '' }}
                                                value="B.Ed">B.Ed</option>
                                            <option
                                                {{ $candidateDocument->program_name == 'MBBS' ? 'selected' : '' }}
                                                value="MBBS">MBBS</option>
                                            <option {{ $candidateDocument->program_name == 'LLB' ? 'selected' : '' }}
                                                value="LLB">
                                                LLB</option>
                                            <option
                                                {{ $candidateDocument->program_name == 'LLB (Hons)' ? 'selected' : '' }}
                                                value="LLB (Hons)">LLB (Hons)</option>
                                            <option
                                                {{ $candidateDocument->program_name == 'PharmD' ? 'selected' : '' }}
                                                value="PharmD">PharmD</option>
                                        </select>
                                        <span id="invalid-feedback-degree" class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                        @error('program_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Major Subjects <span class="text-danger">*</span></label>
                                        <select name="major_subject" id="major_subject"
                                            class="form-control @error('major_subject') is-invalid @enderror"
                                            aria-required="true">
                                            <option {{ $candidateDocument->major_subject == '' ? 'selected' : '' }}
                                                value="" selected disabled>
                                                Please Select </option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Accounting' ? 'selected' : '' }}
                                                value="Accounting">
                                                Accounting</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Aerospace Engineering' ? 'selected' : '' }}
                                                value="Aerospace Engineering">Aerospace Engineering</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Agriculture' ? 'selected' : '' }}
                                                value="Agriculture">Agriculture</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Finance' ? 'selected' : '' }}
                                                value="Finance">Finance</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Geology' ? 'selected' : '' }}
                                                value="Geology">Geology</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Archaeology' ? 'selected' : '' }}
                                                value="Archaeology">Archaeology</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Architecture' ? 'selected' : '' }}
                                                value="Architecture">Architecture</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Aviation' ? 'selected' : '' }}
                                                value="Aviation">Aviation</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Business Studies' ? 'selected' : '' }}
                                                value="Business Studies">Business Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Chemistry' ? 'selected' : '' }}
                                                value="Chemistry">Chemistry</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Civil Engineering' ? 'selected' : '' }}
                                                value="Civil Engineering">Civil Engineering</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Computer Science' ? 'selected' : '' }}
                                                value="Computer Science">Computer Science</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Economics' ? 'selected' : '' }}
                                                value="Economics">Economics</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Education ' ? 'selected' : '' }}
                                                value="Education ">Education </option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Engineering' ? 'selected' : '' }}
                                                value="Engineering">Engineering</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'English' ? 'selected' : '' }}
                                                value="English">English</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Finance' ? 'selected' : '' }}
                                                value="Finance">Finance</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Fine Arts' ? 'selected' : '' }}
                                                value="Fine Arts">Fine Arts</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Gender Studies' ? 'selected' : '' }}
                                                value="Gender Studies">Gender Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Geography' ? 'selected' : '' }}
                                                value="Geography">Geography</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'History/Pakistan Studies' ? 'selected' : '' }}
                                                value="History/Pakistan Studies">History/Pakistan Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Human Resource Management' ? 'selected' : '' }}
                                                value="Human Resource Management">Human Resource Management</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'International Relations' ? 'selected' : '' }}
                                                value="International Relations">International Relations</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Islamic Studies' ? 'selected' : '' }}
                                                value="Islamic Studies">Islamic Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Journalism Studies' ? 'selected' : '' }}
                                                value="Journalism Studies">Journalism Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Marketing' ? 'selected' : '' }}
                                                value="Marketing">Marketing</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Mass Communication' ? 'selected' : '' }}
                                                value="Mass Communication">Mass Communication</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Mathematics' ? 'selected' : '' }}
                                                value="Mathematics">Mathematics</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Medicine' ? 'selected' : '' }}
                                                value="Medicine">Medicine</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Pakistan Studies' ? 'selected' : '' }}
                                                value="Pakistan Studies">Pakistan Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Philosophy' ? 'selected' : '' }}
                                                value="Philosophy">Philosophy</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Physics' ? 'selected' : '' }}
                                                value="Physics">Physics</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Political Sciences' ? 'selected' : '' }}
                                                value="Political Sciences">Political Sciences</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Psychology' ? 'selected' : '' }}
                                                value="Psychology">Psychology</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Public Administration' ? 'selected' : '' }}
                                                value="Public Administration">Public Administration</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Religious Studies' ? 'selected' : '' }}
                                                value="Religious Studies">Religious Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Sociology/ Socio-Cultural Studies' ? 'selected' : '' }}
                                                value="Sociology/ Socio-Cultural Studies">Sociology/ Socio-Cultural
                                                Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Tourism and Hospatility Management ' ? 'selected' : '' }}
                                                value="Tourism and Hospatility Management ">Tourism and Hospatility
                                                Management </option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Urdu' ? 'selected' : '' }}
                                                value="Urdu">Urdu</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Zoology' ? 'selected' : '' }}
                                                value="Zoology">Zoology</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'English Language/Literature' ? 'selected' : '' }}
                                                value="English Language/Literature">English Language/Literature</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Fine Arts & Design' ? 'selected' : '' }}
                                                value="Fine Arts & Design">Fine Arts & Design</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Media, Film & Television' ? 'selected' : '' }}
                                                value="Media, Film & Television">Media, Film & Television</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Other' ? 'selected' : '' }}
                                                value="Other">Other</option>
                                        </select>
                                        <span id="invalid-feedback-degree" class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                        @error('major_subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="masterSubjectsDiv" class="col-md-8"
                            @if ($candidateDocument->academic_achievement == 'masters') style="display: block" @else style="display: none" @endif>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Program Name <span class="text-danger">*</span></label>
                                        <select name="program_name" id="program_name"
                                            class="form-control @error('program_name') is-invalid @enderror"
                                            aria-required="true">
                                            <option {{ $candidateDocument->program_name == '' ? 'selected' : '' }}
                                                value="" selected disabled>
                                                Please Select </option>
                                            <option {{ $candidateDocument->program_name == 'LLM' ? 'selected' : '' }}
                                                value="LLM">
                                                LLM</option>
                                            <option
                                                {{ $candidateDocument->program_name == 'MPhil' ? 'selected' : '' }}
                                                value="MPhil">
                                                MPhil</option>
                                            <option {{ $candidateDocument->program_name == 'MA' ? 'selected' : '' }}
                                                value="MA">MA
                                            </option>
                                            <option {{ $candidateDocument->program_name == 'MBA' ? 'selected' : '' }}
                                                value="MBA">
                                                MBA
                                            </option>
                                            <option
                                                {{ $candidateDocument->program_name == 'EMBA' ? 'selected' : '' }}
                                                value="EMBA">
                                                EMBA</option>
                                            <option {{ $candidateDocument->program_name == 'MSc' ? 'selected' : '' }}
                                                value="MSc">
                                                MSc</option>
                                        </select>
                                        <span id="invalid-feedback-degree" class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                        @error('program_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Major Subjects <span class="text-danger">*</span></label>
                                        <select name="major_subject" id="major_subject"
                                            class="form-control @error('major_subject') is-invalid @enderror"
                                            aria-required="true">
                                            <option {{ $candidateDocument->major_subject == '' ? 'selected' : '' }}
                                                value="" selected disabled>
                                                Please Select </option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Accounting' ? 'selected' : '' }}
                                                value="Accounting">
                                                Accounting</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Aerospace Engineering' ? 'selected' : '' }}
                                                value="Aerospace Engineering">Aerospace Engineering</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Agriculture' ? 'selected' : '' }}
                                                value="Agriculture">Agriculture</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Finance' ? 'selected' : '' }}
                                                value="Finance">Finance</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Geology' ? 'selected' : '' }}
                                                value="Geology">Geology</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Archaeology' ? 'selected' : '' }}
                                                value="Archaeology">Archaeology</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Architecture' ? 'selected' : '' }}
                                                value="Architecture">Architecture</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Aviation' ? 'selected' : '' }}
                                                value="Aviation">Aviation</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Business Studies' ? 'selected' : '' }}
                                                value="Business Studies">Business Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Chemistry' ? 'selected' : '' }}
                                                value="Chemistry">Chemistry</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Civil Engineering' ? 'selected' : '' }}
                                                value="Civil Engineering">Civil Engineering</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Computer Science' ? 'selected' : '' }}
                                                value="Computer Science">Computer Science</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Economics' ? 'selected' : '' }}
                                                value="Economics">Economics</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Education ' ? 'selected' : '' }}
                                                value="Education ">Education </option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Engineering' ? 'selected' : '' }}
                                                value="Engineering">Engineering</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'English' ? 'selected' : '' }}
                                                value="English">English</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Finance' ? 'selected' : '' }}
                                                value="Finance">Finance</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Fine Arts' ? 'selected' : '' }}
                                                value="Fine Arts">Fine Arts</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Gender Studies' ? 'selected' : '' }}
                                                value="Gender Studies">Gender Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Geography' ? 'selected' : '' }}
                                                value="Geography">Geography</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'History/Pakistan Studies' ? 'selected' : '' }}
                                                value="History/Pakistan Studies">History/Pakistan Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Human Resource Management' ? 'selected' : '' }}
                                                value="Human Resource Management">Human Resource Management</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'International Relations' ? 'selected' : '' }}
                                                value="International Relations">International Relations</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Islamic Studies' ? 'selected' : '' }}
                                                value="Islamic Studies">Islamic Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Journalism Studies' ? 'selected' : '' }}
                                                value="Journalism Studies">Journalism Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Marketing' ? 'selected' : '' }}
                                                value="Marketing">Marketing</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Mass Communication' ? 'selected' : '' }}
                                                value="Mass Communication">Mass Communication</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Mathematics' ? 'selected' : '' }}
                                                value="Mathematics">Mathematics</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Medicine' ? 'selected' : '' }}
                                                value="Medicine">Medicine</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Pakistan Studies' ? 'selected' : '' }}
                                                value="Pakistan Studies">Pakistan Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Philosophy' ? 'selected' : '' }}
                                                value="Philosophy">Philosophy</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Physics' ? 'selected' : '' }}
                                                value="Physics">Physics</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Political Sciences' ? 'selected' : '' }}
                                                value="Political Sciences">Political Sciences</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Psychology' ? 'selected' : '' }}
                                                value="Psychology">Psychology</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Public Administration' ? 'selected' : '' }}
                                                value="Public Administration">Public Administration</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Religious Studies' ? 'selected' : '' }}
                                                value="Religious Studies">Religious Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Sociology/ Socio-Cultural Studies' ? 'selected' : '' }}
                                                value="Sociology/ Socio-Cultural Studies">Sociology/ Socio-Cultural
                                                Studies</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Tourism and Hospatility Management ' ? 'selected' : '' }}
                                                value="Tourism and Hospatility Management ">Tourism and Hospatility
                                                Management </option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Urdu' ? 'selected' : '' }}
                                                value="Urdu">Urdu</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Zoology' ? 'selected' : '' }}
                                                value="Zoology">Zoology</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'English Language/Literature' ? 'selected' : '' }}
                                                value="English Language/Literature">English Language/Literature</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Fine Arts & Design' ? 'selected' : '' }}
                                                value="Fine Arts & Design">Fine Arts & Design</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Media, Film & Television' ? 'selected' : '' }}
                                                value="Media, Film & Television">Media, Film & Television</option>
                                            <option
                                                {{ $candidateDocument->major_subject == 'Other' ? 'selected' : '' }}
                                                value="Other">Other</option>
                                        </select>
                                        <span id="invalid-feedback-degree" class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                        @error('major_subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Institute / Board / University <span class="text-danger">*</span></label>
                                <input value="{{ $candidateDocument->institute_name }}" type="text"
                                    placeholder="Enter Institute Name" name="institute_name" id="institute_name"
                                    class="form-control @error('institute_name') is-invalid @enderror"
                                    aria-required="true">

                                @error('institute_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Roll No. / Reg# No. <span class="text-danger">*</span></label>
                                <input value="{{ $candidateDocument->roll_number }}" type="text"
                                    placeholder="Enter Roll No. / Reg# No." name="roll_number" id="roll_number"
                                    class="form-control @error('roll_number') is-invalid @enderror"
                                    aria-required="true">
                                @error('roll_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Grade <span class="text-danger">*</span></label>
                                        <input value="{{ $candidateDocument->grade') }}" type="text" placeholder="Enter Grade"
                                            name="grade" id="grade"
                                            class="form-control @error('grade') is-invalid @enderror">
                                        @error('grade')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Grade Type <span class="text-danger">*</span></label>
                                <select name="grade_type" id="grade_type"
                                    class="form-control @error('grade_type') is-invalid @enderror"
                                    aria-required="true">
                                    <option {{ $candidateDocument->grade_type == '' ? 'selected' : '' }} value=""
                                        selected disabled>
                                        Please Select </option>
                                    <option {{ $candidateDocument->grade_type == 'percentage' ? 'selected' : '' }}
                                        value="percentage">Percentage</option>
                                    <option {{ $candidateDocument->grade_type == 'cgpa' ? 'selected' : '' }}
                                        value="cgpa">
                                        CGPA</option>
                                </select>
                                @error('grade_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="percentage_div" class="col-md-8"
                            @if ($candidateDocument->grade_type == 'percentage') style="display: block" @else style="display: none" @endif>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Marks <span class="text-danger">*</span></label>
                                        <input value="{{ $candidateDocument->total_marks }}" type="number"
                                            placeholder="Enter Total Marks" name="total_marks" id="total_marks"
                                            class="form-control @error('total_marks') is-invalid @enderror"
                                            aria-required="true">
                                        @error('total_marks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Obtained Marks <span class="text-danger">*</span></label>
                                        <input value="{{ $candidateDocument->obtain_marks }}" type="number"
                                            placeholder="Enter Obtained Marks" name="obtain_marks" id="obtain_marks"
                                            class="form-control @error('obtain_marks') is-invalid @enderror"
                                            aria-required="true">
                                        @error('obtain_marks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Percentage <span class="text-danger">*</span></label>
                                        <input value="{{ $candidateDocument->percentage }}" type="text"
                                            placeholder="Enter Percentage" name="percentage" id="percentage" step=".01"
                                            class="form-control @error('percentage') is-invalid @enderror"
                                            aria-required="true">
                                        @error('percentage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Grade <span class="text-danger">*</span></label>
                                        <input value="{{ $candidateDocument->grade }}" type="text"
                                            placeholder="Enter grade" name="grade" id="grade"
                                            class="form-control @error('grade') is-invalid @enderror"
                                            aria-required="true">
                                        @error('grade')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="cgpa" class="col-md-8"
                            @if ($candidateDocument->grade_type == 'cgpa') style="display: block" @else style="display: none" @endif>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total CGPA <span class="text-danger">*</span></label>
                                        <input value="{{ $candidateDocument->total_marks }}" type="number"
                                            placeholder="Enter Total CGPA" name="total_cgpa" id="total_cgpa"
                                            class="form-control @error('total_cgpa') is-invalid @enderror"
                                            aria-required="true">
                                        @error('total_cgpa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Obtained CGPA <span class="text-danger">*</span></label>
                                        <input value="{{ $candidateDocument->obtain_marks }}" type="number"
                                            step=".01" placeholder="Enter Obtained CGPA" name="obtain_cgpa"
                                            id="obtain_cgpa"
                                            class="form-control @error('obtain_cgpa') is-invalid @enderror"
                                            aria-required="true">
                                        @error('obtain_cgpa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="yoa_div" class="col-md-4">
                            <div class="form-group">
                                <label>Year of Admission <span class="text-danger">*</span></label>
                                <input value="{{ $candidateDocument->year_of_admission }}" type="text"
                                    placeholder="Enter Year of Admission" name="year_of_admission"
                                    id="year_of_admission"
                                    class="form-control @error('year_of_admission') is-invalid @enderror"
                                    aria-required="true">
                                @error('year_of_admission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="py_div" class="col-md-4">
                            <div class="form-group">
                                <label>Passing Year <span class="text-danger">*</span></label>
                                <input value="{{ $candidateDocument->passing_year }}" type="text"
                                    placeholder="Enter Passing Year" name="passing_year" id="passing_year"
                                    class="form-control @error('passing_year') is-invalid @enderror"
                                    aria-required="true">
                                @error('passing_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Degree / Certificate <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input name="document" id="document" type="file"
                                        value="{{ $candidateDocument->document }}"
                                        class="file_name custom-file-input @error('document') is-invalid @enderror"
                                        data-span="file_name">
                                    <label for="document" class="custom-file-label">Upload Document</label>
                                </div>
                                @error('document')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-text text-success m-b-none" id="file_name"></span>
                                <span class="form-text m-b-none" style="color: green">Note: Only PDF
                                    format and size must be less than 2 MB</span>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                            <button id="form_submit_btn" class="btn btn-primary btn-sm" type="submit">Save
                                Changes</button>
                            {{-- <a href="{{ route('user-certificates.index') }}" class="btn btn-success btn-sm">
                                Next</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
