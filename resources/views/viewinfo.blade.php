{{-- @section('content') --}}
<div class="container">
    <h2>Form Data</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3">
        <a href="{{ url('/create') }}" class="btn btn-primary">Add New</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>State</th>
                <th>City</th>
                <th>Education</th>
                <th>Profile Photo</th>
                <th>Skills</th>
                <th>Certificates</th>
                <th>Profession</th>
                <th>Company Name</th>
                <th>Job Started</th>
                <th>Business Name</th>
                <th>Location</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $form)
                <tr>
                    <td>{{ $form->name }}</td>
                    <td>{{ $form->birthday }}</td>
                    <td>{{ $form->gender }}</td>
                    <td>{{ $form->state }}</td>
                    <td>{{ $form->city }}</td>
                    <td>{{ $form->education }}</td>
                    <td>
                        @if ($form->profile_photo)
                            <img src="{{ asset('storage/' . $form->profile_photo) }}" alt="Profile Photo" width="100">
                        @else
                            No photo available
                        @endif
                    </td>
                    <td>{{ $form->skills }}</td>
                    <td>
                        @if ($form->certificates)
                            @foreach (json_decode($form->certificates) as $certificate)
                                <a href="{{ asset('storage/' . $certificate) }}" target="_blank">{{ basename($certificate) }}</a><br>
                            @endforeach
                        @else
                            No certificates uploaded
                        @endif
                    </td>
                    <td>{{ $form->profession }}</td>
                    <td>{{ $form->company_name }}</td>
                    <td>{{ $form->job_started }}</td>
                    <td>{{ $form->business_name }}</td>
                    <td>{{ $form->location }}</td>
                    <td>{{ $form->email }}</td>
                    <td>{{ $form->mobile }}</td>
                    <td>
                        <a href="update/{{ $form->id }}"><button>Edit</button></a>
                        <a href="delete/{{ $form->id }}"><button onclick="return confirm('Are you sure?');">Delete</button></a>
                     </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- @endsection --}}
