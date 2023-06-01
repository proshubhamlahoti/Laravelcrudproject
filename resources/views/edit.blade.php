<form method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $form->id }}">

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $form->name) }}">
    </div>

    <div>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $form->birthday) }}">
    </div>

    <div>
        <label>Gender:</label>
        <input type="radio" id="gender_male" name="gender" value="Male" {{ old('gender', $form->gender) === 'Male' ? 'checked' : '' }}>
        <label for="gender_male">Male</label>
        <input type="radio" id="gender_female" name="gender" value="Female" {{ old('gender', $form->gender) === 'Female' ? 'checked' : '' }}>
        <label for="gender_female">Female</label>
    </div>

    <div>
        <label for="state">State:</label>
        <select id="state" name="state">
            <option value="Maharashtra" {{ old('state', $form->state) === 'Maharashtra' ? 'selected' : '' }}>Maharashtra</option>
            <option value="Karnataka" {{ old('state', $form->state) === 'Karnataka' ? 'selected' : '' }}>Karnataka</option>
            <option value="Punjab" {{ old('state', $form->state) === 'Punjab' ? 'selected' : '' }}>Punjab</option>
            <option value="Gujarat" {{ old('state', $form->state) === 'Gujarat' ? 'selected' : '' }}>Gujarat</option>
            <option value="Madhya Pradesh" {{ old('state', $form->state) === 'Madhya Pradesh' ? 'selected' : '' }}>Madhya Pradesh</option>
        </select>
    </div>

    <div>
        <label for="city">City:</label>
        <select id="city" name="city">
            
        </select>
    </div>

    <div>
        <label for="education">Education and Year of Completion:</label>
        <div id="education_fields">
            @php
                $decodedEducation = json_decode($form->education);
                $yearOfCompletion = is_array(old('year_of_completion')) ? old('year_of_completion') : [];
            @endphp
            @foreach ($decodedEducation as $index => $education)
                <div>
                    <input type="text" name="education[]" placeholder="Education" value="{{ old('education.' . $index, $education) }}">
                    <input type="text" name="year_of_completion[]" placeholder="Year of Completion" value="{{ old('year_of_completion.' . $index, isset($yearOfCompletion[$index]) ? $yearOfCompletion[$index] : '') }}">
                </div>
            @endforeach
        </div>
        <button type="button" id="add_education">Add Education</button>
        <button type="button" id="remove_education">Remove Education</button>
    </div>
<div>
    <label for="profile_photo">Profile Photo:</label>
    @if ($form->profile_photo)
        <img src="{{ asset('storage/' . $form->profile_photo) }}" alt="Profile Photo">
    @else
        No photo available
    @endif
</div>

<div>
    <label for="certificates">Certificates:</label>
    @if ($form->certificates)
        @php
            $decodedCertificates = json_decode($form->certificates);
        @endphp
        @foreach ($decodedCertificates as $certificate)
            <a href="{{ asset('storage/' . $certificate) }}" target="_blank">{{ basename($certificate) }}</a><br>
        @endforeach
    @else
        No certificates uploaded
    @endif
</div>


<<div>
    <label for="skills">Skills:</label>
    <select id="skills" name="skills[]" multiple>
        @php
            $selectedSkills = is_array(old('skills')) ? old('skills') : (json_decode($form->skills) ?? []);
        @endphp
        <option value="HTML" {{ in_array('HTML', $selectedSkills) ? 'selected' : '' }}>HTML</option>
        <option value="CSS" {{ in_array('CSS', $selectedSkills) ? 'selected' : '' }}>CSS</option>
        <option value="JavaScript" {{ in_array('JavaScript', $selectedSkills) ? 'selected' : '' }}>JavaScript</option>
        
    </select>
</div>





    <div>
        <label>Profession:</label>
        <input type="radio" id="profession_salaried" name="profession" value="Salaried" {{ old('profession', $form->profession) === 'Salaried' ? 'checked' : '' }}>
        <label for="profession_salaried">Salaried</label>
        <input type="radio" id="profession_self_employed" name="profession" value="Self-employed" {{ old('profession', $form->profession) === 'Self-employed' ? 'checked' : '' }}>
        <label for="profession_self_employed">Self-employed</label>
    </div>

    
    @if(old('profession', $form->profession) === 'Salaried')
        <div id="company_name_field">
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $form->company_name) }}">
        </div>

        <div id="job_started_field">
            <label for="job_started">Job Started From:</label>
            <input type="date" id="job_started" name="job_started" value="{{ old('job_started', $form->job_started) }}">
        </div>

        <div id="business_name_field" style="display: none;">
            <label for="business_name">Business Name:</label>
            <input type="text" id="business_name" name="business_name" value="{{ old('business_name', $form->business_name) }}">
        </div>

        <div id="location_field" style="display: none;">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="{{ old('location', $form->location) }}">
        </div>
    @elseif(old('profession', $form->profession) === 'Self-employed')
        <div id="company_name_field" style="display: none;">
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $form->company_name) }}">
        </div>

        <div id="job_started_field" style="display: none;">
            <label for="job_started">Job Started From:</label>
            <input type="date" id="job_started" name="job_started" value="{{ old('job_started', $form->job_started) }}">
        </div>

        <div id="business_name_field">
            <label for="business_name">Business Name:</label>
            <input type="text" id="business_name" name="business_name" value="{{ old('business_name', $form->business_name) }}">
        </div>

        <div id="location_field">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="{{ old('location', $form->location) }}">
        </div>
    @endif

    <div>
        <label for="email">Email ID:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $form->email) }}">
    </div>

    <div>
        <label for="mobile">Mobile No:</label>
        <input type="text" id="mobile" name="mobile" value="{{ old('mobile', $form->mobile) }}">
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        
        var educationCounter = 1;
        $('#add_education').click(function() {
            var educationField = '<div><input type="text" name="education[]" placeholder="Education"><input type="text" name="year_of_completion[]" placeholder="Year of Completion"></div>';
            $('#education_fields').append(educationField);
            educationCounter++;
        });
        $('#remove_education').click(function() {
            if (educationCounter > 1) {
                $('#education_fields div:last-child').remove();
                educationCounter--;
            }
        });

        
        $('#state').change(function() {
            var state = $(this).val();
            var cityOptions = '';

           
            if (state === 'Maharashtra') {
                cityOptions = '<option value="Mumbai">Mumbai</option>' +
                    '<option value="Pune">Pune</option>' +
                    '<option value="Nagpur">Nagpur</option>';
            } else if (state === 'Karnataka') {
                cityOptions = '<option value="Bengaluru">Bengaluru</option>' +
                    '<option value="Mysuru">Mysuru</option>' +
                    '<option value="Hubli">Hubli</option>';
            } else if (state === 'Punjab') {
                cityOptions = '<option value="Chandigarh">Chandigarh</option>' +
                    '<option value="Amritsar">Amritsar</option>' +
                    '<option value="Ludhiana">Ludhiana</option>';
            } else if (state === 'Gujarat') {
                cityOptions = '<option value="Ahmedabad">Ahmedabad</option>' +
                    '<option value="Surat">Surat</option>' +
                    '<option value="Vadodara">Vadodara</option>';
            } else if (state === 'Madhya Pradesh') {
                cityOptions = '<option value="Bhopal">Bhopal</option>' +
                    '<option value="Indore">Indore</option>' +
                    '<option value="Gwalior">Gwalior</option>';
            }

            
            $('#city').html(cityOptions);
        }).trigger('change'); 

        
        $('input[name="profession"]').change(function() {
            var profession = $(this).val();
            if (profession === 'Salaried') {
                $('#company_name_field').show();
                $('#job_started_field').show();
                $('#business_name_field').hide();
                $('#location_field').hide();
            } else if (profession === 'Self-employed') {
                $('#company_name_field').hide();
                $('#job_started_field').hide();
                $('#business_name_field').show();
                $('#location_field').show();
            }
        });
    });
</script>
  