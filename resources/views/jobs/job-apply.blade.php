@extends('landing-layouts.master')

@section('content')

<x-main-site.hero-component total-jobs="{{ $totalJobs }}" job-title="{{ isset($jobTitle) ? $jobTitle : '' }}" job-type="{{ isset($jobType) ? $jobType : '' }}" location="{{ isset($location) ? $location : '' }}" />

<div class="ftco-section bg-light" id="jobApplication">
  <div class="container">
    <div class="row justify-content-center pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2 class="mb-4">
            Job Application
          </h2>
        </div>
      </div>
   <div class="row">
          <div class="col-md-6 col-lg-6 mb-5">
            <div class="p-5 bg-white">
              <div class="mb-4 mb-md-5 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h4">{{ $job->title }}</h2>
                  <div class="badge-wrap">
                  @if ($job->job_type == 'part-time') <span class="bg-primary text-white badge py-2 px-3">Part-time</span> 
                    @elseif ($job->job_type == 'full-time') <span class="bg-warning text-white badge py-2 px-3">Full-time</span> 
                    @elseif ($job->job_type == 'freelance') <span class="bg-info text-white badge py-2 px-3">Freelance</span> 
                    @elseif ($job->job_type == 'internship') <span class="bg-secondary text-white badge py-2 px-3">Internship</span> 
                    @elseif ($job->job_type == 'temporary') <span class="bg-danger text-white badge py-2 px-3">Temporary</span>
                    @else  <span class="bg-info text-white badge py-2 px-3">{{ $job->job_type }}</span> 
                    @endif 
                  </div>
                </div>
                <div class="job-post-item-body d-block ">
                  <div class="mr-3">
                    <i class="fas fa-layer-group text-success"></i>
                    <a href="#">{{ $job->employer->employer ? $job->employer->employer->company_name : NULL }}</a>
                  </div>
                  <div class="mr-3">
                    <i class="fa fa-map-marker-alt text-success mr-1"></i>
                    <span>{{ $job->location }}</span>
                  </div>
                  <div class="mr-3">
                    <i class="far fa-money-bill-alt text-success mr-1"></i><span> &#8369; {{ number_format($job->salary, 2) }}</span>
                  </div>
                  <div>
                        <i class="far fa-calendar-alt text-primary me-2 mr-1"></i>Date Line: {{ $job->deadline->format('d M, Y') }}
                  </div>
                  <div align="right">
                  @foreach($job->categories as $category) 
                        <span class="badge bg-light py-2 px-3" style="font-size: 10px;">{{ $category->name }}</span>
                        @endforeach
                  </div> 
                </div>
              </div>
              <div class="mb-1">
                <h5>Job description</h5>
                <p>{{ $job->description }}</p>
              </div>
              <hr>
              <div class="mb-1">
                <h5>Job Type</h5>
                <p>{{ $job->job_type }}</p>
              </div>
              <hr>
              <div class="mb-1">
              @php 
                        $educationString = explode('*', $job->education);
                        $education = "";
                        foreach($educationString as $educ){
                           $education .= $educ.", ";
                        }
                        $education = rtrim($education, ", ");
                    @endphp
                <h5>Education</h5>
                <p>{{ $education }}</p>
              </div>
              <hr>
              <div class="mb-1">
              @switch($job->yrOfexp)
                                    @case('0')
                                        @php $exp = "None"; @endphp
                                        @break
                                    @case('1')
                                        @php $exp = "1-6 mos"; @endphp
                                        @break
                                    @case('2')
                                        @php $exp = "7-12 mos"; @endphp
                                        @break
                                    @case('3')
                                        @php $exp = "1-2 yrs"; @endphp
                                        @break
                                    @case('4')
                                        @php $exp = "2 yrs and above"; @endphp
                                        @break    
                                @endswitch
                <h5>Years of Relevant Experience  </h5>
                <p>{{ $exp }}</p>
              </div>
              <hr>
              <div class="mb-1">
              @switch($job->eligibility)
                                    @case('0')
                                        @php $el = "None Required"; @endphp
                                        @break
                                    @case('1')
                                        @php $el = "CS Sub-professional"; @endphp
                                        @break
                                    @case('2')
                                        @php $el = "CS Professional"; @endphp
                                        @break
                                    @case('3')
                                        @php $el = "Licensed Professional"; @endphp
                                        @break  
                                @endswitch
                <h5>Eligibility  </h5>
                <p>{{ $el }}</p>
              </div>
              <hr>
              <div class="mb-1">
                <h5>Requirements</h5>
                <p>{{ $job->requirements }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 mb-5">
            <div class="p-5 bg-white">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h4">{{ Auth::user()->name }}</h2>
                </div>
                <hr>
                <form action="{{ route('job-apply.store', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">Resume</label><br>
                      <input type="file"  name="resume" id="resume" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                <label for="education">Educational Attainment</label>
                    <select id="educational" class="form-control" name="education" required>
                        <option></option>
                        <option>Elementary level or graduate</option>
                        <option>Secondary level or graduate</option>
                        <option>Vocational Course Graduate</option>
                        <option>College level</option>
                        <option>Bachelor of Arts in History</option>
                        <option>Bachelor of Arts in Philosophy</option>
                        <option>Bachelor of Fine Arts Major in Industrial Design</option>
                        <option>Bachelor of Fine Arts Major in Painting</option>
                        <option>Bachelor of Fine Arts Major in Sculpture </option>
                        <option>Bachelor of Fine Arts Major in Visual Communication</option>
                        <option>Bachelor of Arts in Economics</option>
                        <option>Bachelor of Science in Economics</option>
                        <option>Bachelor of Arts in Psychology</option>
                        <option>Bachelor of Science in Psychology</option>
                        <option>Bachelor of Science in Criminology</option>
                        <option>Bachelor of Arts in Political Science</option>
                        <option>Bachelor of Arts in English</option>
                        <option>Bachelor of Arts in Linguistics</option>
                        <option>Bachelor of Arts in Literature</option>
                        <option>Bachelor of Arts in Anthropology</option>
                        
                        <option>Bachelor of Arts in Sociology</option>
                        <option>Bachelor of Arts in Filipino</option>
                        <option>Bachelor of Science in Forensic Science </option>
                        <option>Bachelor of Arts in Islamic Studies</option>
                        <option>Bachelor of Science in Environmental Science</option>
                        <option>Bachelor of Science in Forestry</option>
                        <option>Bachelor of Science in Fisheries</option>
                        <option>Bachelor of Science in Geology</option>
                        <option>Bachelor of Science in Biology</option>
                        <option>Bachelor of Science in Molecular Biology</option>
                        <option>Bachelor of Science in Physics</option>
                        <option>Bachelor of Science in Applied Physics</option>
                        <option>Bachelor of Science in Chemistry</option>
                        <option>Bachelor of Science in Computer Science</option>
                        <option>Bachelor of Science in Information Technology</option>
                        <option>Bachelor of Science in Information Systems</option>

                        <option>Bachelor of Science in Mathematics</option>
                        <option>Bachelor of Science in Applied Mathematics</option>
                        <option>Bachelor of Science in Statistics</option>
                        <option>Bachelor of Science in Agriculture</option>
                        <option>Bachelor of Science in Agribusiness</option>
                        <option>Bachelor of Science in Agroforestry</option>
                        <option>Bachelor of Science in Architecture</option>
                        <option>Bachelor in Landscape Architecture</option>
                        <option>Bachelor of Science in Interior Design</option>
                        <option>Bachelor of Science in Accountancy</option>
                        <option>Bachelor of Science in Accounting Technology</option>
                        <option>Bachelor of Science in Business Administration</option>
                        <option>Bachelor of Science in Business Administration Major in Business Economics</option>
                        <option>Bachelor of Science in Business Administration Major in Financial Management</option>
                        <option>Bachelor of Science in Business Administration Major in Human Resource Development</option>
                        <option>Bachelor of Science in Business Administration Major in Marketing Management</option>

                        <option>Bachelor of Science in Business Administration Major in Operations Management</option>
                        <option>Bachelor of Science in Hotel and Restaurant Management</option>
                        <option>Bachelor of Science in Entrepreneurship</option>
                        <option>Bachelor of Science in Office Administration</option>
                        <option>Bachelor of Science in Real Estate Management</option>
                        <option>Bachelor of Science in Tourism Management</option>
                        <option>Bachelor of Science in Medical Technology</option>
                        <option>Bachelor of Science in Midwifery</option>
                        <option>Bachelor of Science in Nursing</option>
                        <option>Bachelor of Science in Occupational Therapy</option>
                        <option>Bachelor of Science in Pharmacy</option>
                        <option>Bachelor of Science in Physical Therapy</option>
                        <option>Bachelor of Science in Radiologic Technology</option>
                        <option>Bachelor of Science in Respiratory Therapy</option>
                        <option>Bachelor of Science in Speech-Language Pathology</option>
                        <option>Bachelor of Science in Sports Science</option>

                        <option>Bachelor in Secondary Education</option>
                        <option>Bachelor in Elementary Education</option>
                        <option>Bachelor in Secondary Education Major in Technology and Livelihood Education</option>
                        <option>Bachelor in Secondary Education Major in Biological Sciences</option>
                        <option>Bachelor in Secondary Education Major in English</option>
                        <option>Bachelor in Secondary Education Major in Filipino</option>
                        <option>Bachelor in Secondary Education Major in Mathematics</option>
                        <option>Bachelor in Secondary Education Major in Islamic Studies</option>
                        <option>Bachelor in Secondary Education Major in Music, Arts, Physical and Health Education</option>
                        <option>Bachelor in Secondary Education Major in Physical Sciences</option>
                        <option>Bachelor in Secondary Education Major in Social Studies</option>
                        <option>Bachelor in Secondary Education Major in Values Education</option>
                        <option>Bachelor in Elementary Education Major in Preschool Education</option>
                        <option>Bachelor in Elementary Education Major in Special Education</option>
                        <option>Bachelor of Library and Information Science in the Philippines</option>
                        <option>Bachelor of Physical Education</option>

                        <option>Bachelor of Science in Aeronautical Engineering</option>
                        <option>Bachelor of Science in Ceramic Engineering</option>
                        <option>Bachelor of Science in Chemical Engineering</option>
                        <option>Bachelor of Science in Civil Engineering</option>
                        <option>Bachelor of Science in Computer Engineering</option>
                        <option>Bachelor of Science in Electrical Engineering</option>
                        <option>Bachelor of Science in Electronics and Communications Engineering</option>
                        <option>Bachelor of Science in Geodetic Engineering</option>
                        <option>Bachelor of Science in Geological Engineering</option>
                        <option>Bachelor of Science in Industrial Engineering</option>
                        <option>Bachelor of Science in Marine Engineering</option>
                        <option>Bachelor of Science in Materials Engineering</option>
                        <option>Bachelor of Science in Mechanical Engineering</option>
                        <option>Bachelor of Science in Metallurgical Engineering</option>
                        <option>Bachelor of Science in Mining Engineering</option>
                        <option>Bachelor of Science in Petroleum Engineering</option>

                        <option>Bachelor of Science in Sanitary Engineering</option>
                        <option>Bachelor of Arts in Broadcasting</option>
                        <option>Bachelor of Arts in Communication</option>
                        <option>Bachelor of Science in Development Communication</option>
                        <option>Bachelor of Arts in Journalism</option>
                        <option>Bachelor of Arts in Mass Communication</option>
                        <option>Bachelor of Science in Community Development</option>
                        <option>Bachelor of Science in Customs Administration</option>
                        <option>Bachelor of Science in Foreign Service</option>
                        <option>Bachelor of Science in International Studies</option>
                        <option>Bachelor of Science in Public Safety</option>
                        <option>Bachelor of Science in Social Work</option>
                        <option>Bachelor of Science in Marine Transportation</option>
                        <option>Bachelor of Science in Food Technology</option>
                        <option>Bachelor of Science in Nutrition and Dietetics</option>
                        <option>Bachelor of Science in Hospitality Management</option>

			<option>Master of Accountancy</option>
                        <option>Master of Advanced Study</option>
                        <option>Master of Agricultural Economics</option>
                        <option>Master of Applied Finance</option>
                        <option>Master of Applied Science</option>
                        <option>Master of Architecture</option>
                        <option>Master of Arts in Liberal Studies</option>
                        <option>Master of Arts in Special Education</option>
                        <option>Master of Arts in Teaching</option>
                        <option>Master of Bioethics</option>
                        <option>Master of Business Administration</option>
                        <option>Master of Business, Entrepreneurship and Technology</option>
                        <option>Master of Business</option>
                        <option>Master of Business Engineering</option>
                        <option>Master of Business Informatics</option>
                        <option>Master of Chemistry</option>

			<option>Master of Christian Education</option>
                        <option>Master of City Planning</option>
                        <option>Master of Commerce</option>
                        <option>Master of Computational Finance</option>
                        <option>Master of Computer Applications</option>
                        <option>Master of Counselling</option>
                        <option>Master of Criminal Justice</option>
                        <option>Master of Creative Technologies</option>
                        <option>Master of Data Science</option>
                        <option>Master of Defence Studies</option>
                        <option>Master of Design</option>
                        <option>Masters of Development Economics</option>
                        <option>Master of Divinity</option>
                        <option>Master of Economics</option>
                        <option>Master of Education</option>
                        <option>Master of Engineering Management</option>

			<option>Master of Applied Science</option>
                        <option>Master of Enterprise</option>
                        <option>Master of European Law</option>
                        <option>Master of Financial Economics</option>
                        <option>Master of Financial Engineering</option>
                        <option>Master of Financial Mathematics</option>
                        <option>Master of Fine Arts</option>
                        <option>Master of Health Administration</option>
                        <option>Master of Health Economics</option>
                        <option>Master of Health Science</option>
                        <option>Master of Humanities</option>
                        <option>Master of Industrial and Labor Relations</option>
                        <option>Master of International Affairs</option>
                        <option>Master of International Business</option>
                        <option>Master of International Economics</option>
                        <option>Master of International Studies</option>

			<option>Master of Information and Cybersecurity</option>
                        <option>Master of Information and Data Science</option>
                        <option>Master of Information Management</option>
                        <option>Master of Information System Management</option>
                        <option>Master of Journalism</option>
                        <option>Master of Jurisprudence</option>
                        <option>Master of Laws</option>
                        <option>Master of Mass Communication</option>
                        <option>Master of Studies in Law</option>
                        <option>Master of Landscape Architecture</option>
                        <option>Master of Letters</option>
                        <option>Master of Liberal Arts in Extension Studies</option>
                        <option>Master of Library and Information Science</option>
                        <option>Master of Management</option>
                        <option>Master of Management of Innovation</option>
                        <option>Master of Marketing Research</option>

			<option>Master of Mathematical Finance</option>
                        <option>Master of Mathematics</option>
                        <option>Master of Medical Science</option>
                        <option>Master of Medicine</option>
                        <option>Master of Military Art and Science</option>
                        <option>Master of Military Operational Art and Science</option>
                        <option>Master of Ministry</option>
                        <option>Master of Music</option>
                        <option>Master of Music Education</option>
                        <option>Master of Natural Resources</option>
                        <option>Master of Occupational Behaviour and Development</option>
                        <option>Master of Occupational Therapy</option>
                        <option>Master of Pharmacy</option>
                        <option>Master of Philosophy</option>
                        <option>Master of Physician Assistant Studies</option>
                        <option>Master of Physics</option>

			<option>Master of Political Science</option>
                        <option>Master of Professional Studies</option>
                        <option>Master of Psychology</option>
                        <option>Master of Public Administration</option>
                        <option>Master of Public Affairs</option>
                        <option>Master of Public Health</option>
                        <option>Master of Public Management</option>
                        <option>Master of Public Policy</option>
                        <option>Master of Public Relations</option>
                        <option>Master of Public Service</option>
                        <option>Master of Quantitative Finance</option>
                        <option>Master of Rabbinic Studies</option>
                        <option>Master of Real Estate Development</option>
                        <option>Master of Religious Education</option>
                        <option>Master of Research</option>
                        <option>Master of Sacred Music</option>

			<option>Master of Sacred Theology</option>
                        <option>Master of Science in Administration</option>
                        <option>Master of Science in Archaeology</option>
                        <option>Master of Science in Biblical Archaeology</option>
                        <option>Master of Science in Bioinformatics</option>
                        <option>Master of Science in Computer Science</option>
                        <option>Master of Science in Counselling</option>
                        <option>Master of Science in Cyber Security</option>
                        <option>Master of Science in Engineering</option>
                        <option>Master of Science in Development Administration</option>
                        <option>Master of Science in Finance</option>
                        <option>Master of Science in Foreign Service</option>
                        <option>Master of Science in Health Informatics</option>
                        <option>Master of Science in Human Resource Development</option>
                        <option>Master of Science in Information Assurance</option>
                        <option>Master of Science in Information Systems</option>

			<option>Master of Science in Leadership</option>
                        <option>Master of Science in Information Technology</option>
                        <option>Master of Science in Management</option>
                        <option>Master of Science in Nursing</option>
                        <option>Master of Science in Project Management</option>
                        <option>Master of Science in Supply Chain Management</option>
                        <option>Master of Science in Teaching</option>
                        <option>Master of Science in Taxation</option>
                        <option>Master of Science in Yoga Therapy</option>
                        <option>Master of Social Science</option>
                        <option>Master of Social Work</option>
                        <option>Master of Strategic Studies</option>
                        <option>Master of Studies</option>
                        <option>Master of Surgery</option>
                        <option>Master of Talmudic Law</option>
                        <option>Master of Taxation</option>

			<option>Master of Theological Studies</option>
                        <option>Master of Technology</option>
                        <option>Master of Technology Management</option>
                        <option>Master of Theology</option>
                        <option>Master of Urban Planning</option>
                        <option>Master of Veterinary Science</option>

			<option>Doctor of Arts (DA)</option>
                        <option>Doctor of Business Administration (DBA)</option>
                        <option>Doctor of Canon Law (JCD)</option>
                        <option>Doctor of Design (DDes)</option>
                        <option>Doctor of Engineering or Engineering Science (DEng, DESc, DES)</option>
                        <option>Doctor of Education (EdD)</option>
                        <option>Doctor of Fine Arts (DFA.)</option>
                        <option>Doctor of Juridical Science (JSD, SJD)</option>
                        <option>Doctor of Musical Arts (DMA)</option>
                        <option>Doctor of Music Education (DME)</option>
                        <option>Doctor of Modern Languages (DML)</option>
                        <option>Doctor of Nursing Science (DNSc)</option>
                        <option>Doctor of Philosophy (PhD)</option>
                        <option>Doctor of Public Health (DPH)</option>
                        <option>Doctor of Science (DSc, ScD)</option>
                        <option>Doctor of Anesthesia Practice (Dr.AP)</option> 

			<option>Doctor of Applied Science (D.A.S.)</option>
                        <option>Doctor of Architecture (D.Arch.)</option>
                        <option>Doctor of Athletic Training (D.A.T.)</option>
                        <option>Doctor of Audiology (Au.D)</option>
                        <option>Doctor of Behavioral Health (D.B.H.)</option>
                        <option>Doctor of Chemistry (D.Chem.)</option>
                        <option>Doctor of Clinical Nutrition (D.C.N.)</option>
                        <option>Doctor of Clinical Science in Speech-Language Pathology (CScD)</option>
                        <option>Doctor of Comparative Law (D.C.L.)</option>
                        <option>Doctor of Computer Science (D.C.S.)</option>
                        <option>Doctor of Criminal Justice (D.C.J.)</option>
                        <option>Doctor of Criminology (D.Crim.)</option>
                        <option>Doctor of Dental Medicine (D.M.D.)</option>
                        <option>Doctor of Dental Surgery (D.D.S.)</option>
                        <option>Doctor of Environmental Science and Engineering (D.Env.)</option>
                        <option>Doctor of Forestry (D.F.)</option> 

			<option>Doctor of Geological Science (D.G.S.)</option>
                        <option>Doctor of Health Administration (D.H.A.)</option>
                        <option>Doctor of Health and Safety (D.H.S.)</option>
                        <option>Doctor of Health Education (D.H.Ed)</option>
                        <option>Doctor of Health Science (D.H.Sc., D.H.S.)</option>
                        <option>Doctor of Industrial Technology (D.I.T.)</option>
                        <option>Doctor of Information Technology (D.I.T.)</option>
                        <option>Juris Doctor (J.D.)</option>
                        <option>Doctor of Law and Policy (L.P.D., D.L.P.)</option>
                        <option>Doctor of Liberal Studies (D.L.S.)</option>
                        <option>Doctor of Library Science (D.L.S.)</option>
                        <option>Doctor of Management (D.M.)</option>
                        <option>Doctor of Medical Humanities (D.M.H.)</option>
                        <option>Doctor of Medical Physics (D.M.P)</option>
                        <option>Doctor of Medical Science (D.M.Sc.)</option>
                        <option>Doctor of Medicine (M.D.)</option> 

			<option>Doctor of Music (D.M., D.Mus.)</option>
                        <option>Doctor of Music Therapy (D.M.T.)</option>
                        <option>Doctor of Naprapathic Medicine (D.N.)</option>
                        <option>Doctor of Naturopathic Medicine (N.D., N.M.D.)</option>
                        <option>Doctor of Nursing Practice (D.N.P.)</option>
                        <option>Doctor of Occupational Therapy (O.T.D., D.O.T.)</option>
                        <option>Doctor of Optometry (O.D.)</option>
                        <option>Doctor of Oriental Medicine (D.O.M., O.M.D.)</option>
                        <option>Doctor of Osteopathic Medicine (D.O.)</option>
                        <option>Doctor of Pharmacy (Pharm.D.)</option>
                        <option>Doctor of Physical Education (D.P.E.)</option>
                        <option>Doctor of Podiatric Medicine (D.P.M.)</option>
                        <option>Doctor of Professional Studies (D.P.S.)</option>
                        <option>Doctor of Psychology (Psy.D)</option>
                        <option>Doctor of Public Administration (D.P.A.)</option>
                        <option>Doctor of Social Science (D.S.Sc.)</option> 

			<option>Doctor of Social Work (D.S.W.)</option>
                        <option>Doctor of Veterinary Medicine (D.V.M.)</option>
                        <option>Doctor of the Science of Law (J.S.D.)</option>
                    </select>
            </div>

            <div class="form-group">
                <label for="yrOfexp">{{ __('Range of relevant experience') }}</label>
                    <select id="yrOfexp" style="width: 100%; padding: 5px; border-raduis: 10px; border: 1px solid #ccc" name="yrOfexp" required>
                        <option></option>
                        <option value="0">None</option>
                        <option value="1">1-6 mos</option>
                        <option value="2">7-12 mos</option>
                        <option value="3">1-2 yrs</option>
                        <option value="4">2 yrs and above</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="yrOfexp">{{ __('Eligibility') }}</label>
                    <select id="eligibility" style="width: 100%; padding: 5px; border-raduis: 10px; border: 1px solid #ccc" @error('eligibility') is-invalid @enderror" name="eligibility" required autocomplete="job_type">
                        <option></option>
                        <option value="0">None</option>
                        <option value="1">CS Sub-professional</option>
                        <option value="2">CS Professional</option>
                        <option value="3">Licensed Professional</option>
                    </select>
                    @error('eligibility')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
                    <div class="form-group">
                        <label for="">Cover Letter</label>
                        <textarea class="form-control" name="letter" id="letter" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
  </div>
</div>
@endsection