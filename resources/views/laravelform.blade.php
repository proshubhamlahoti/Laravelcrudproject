<form method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
    </div>

    <div>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday">
    </div>

    <div>
        <label>Gender:</label>
        <input type="radio" id="gender_male" name="gender" value="Male">
        <label for="gender_male">Male</label>
        <input type="radio" id="gender_female" name="gender" value="Female">
        <label for="gender_female">Female</label>
    </div>

    <div>
        <label for="state">State:</label>
        <select id="state" name="state">
            <option value="Maharashtra">Maharashtra</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Punjab">Punjab</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
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
            <div>
                <input type="text" name="education[]" placeholder="Education">
                <input type="text" name="year_of_completion[]" placeholder="Year of Completion">
            </div>
        </div>
        <button type="button" id="add_education">Add Education</button>
        <button type="button" id="remove_education">Remove Education</button>
    </div>

    <div>
        <label for="profile_photo">Profile Photo:</label>
        <input type="file" id="profile_photo" name="profile_photo">
    </div>

    <div>
        <label for="skills">Skills:</label>
        <select id="skills" name="skills[]" multiple>
            <option value="HTML">HTML</option>
        <option value="CSS">CSS</option>
        <option value="JavaScript">JavaScript</option>
        </select>
    </div>

    <div>
        <label for="certificates">Upload Certificates:</label>
        <input type="file" id="certificates" name="certificates[]" multiple>
    </div>

    <div>
        <label>Profession:</label>
        <input type="radio" id="profession_salaried" name="profession" value="Salaried">
        <label for="profession_salaried">Salaried</label>
        <input type="radio" id="profession_self_employed" name="profession" value="Self-employed">
        <label for="profession_self_employed">Self-employed</label>
    </div>

    <div id="company_name_field" style="display: none;">
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name">
    </div>

    <div id="job_started_field" style="display: none;">
        <label for="job_started">Job Started From:</label>
        <input type="date" id="job_started" name="job_started">
    </div>

    <div id="business_name_field" style="display: none;">
        <label for="business_name">Business Name:</label>
        <input type="text" id="business_name" name="business_name">
    </div>

    <div id="location_field" style="display: none;">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
    </div>

    <div>
        <label for="email">Email ID:</label>
        <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="mobile">Mobile No:</label>
        <input type="text" id="mobile" name="mobile">
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
  