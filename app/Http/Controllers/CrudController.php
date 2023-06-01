<?php

namespace App\Http\Controllers;
use App\Models\Laravelform;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class CrudController extends Controller
{
     function create()
    {
        
        return view('laravelform');
    }
     function index()
    {
        
        $data = Laravelform::all();

                return view('viewinfo', compact('data'));
    }
      function saveFormData(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required',
            'state' => 'required',
            'city' => 'required',
            'education' => 'array',
            'education.*' => 'required',
            'year_of_completion' => 'array',
            'year_of_completion.*' => 'required',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'skills' => 'array',
            'skills.*' => 'required',
            'certificates' => 'array',
            'certificates.*' => 'file|mimes:pdf|max:2048',
            'profession' => 'required',
            'company_name' => 'required_if:profession,Salaried',
            'job_started' => 'required_if:profession,Salaried|date',
            'business_name' => 'required_if:profession,Self-employed',
            'location' => 'required_if:profession,Self-employed',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);
        
        $formData = new LaravelForm();
    $formData->name = $request->input('name');
    $formData->birthday = $request->input('birthday');
    $formData->gender = $request->input('gender');
    $formData->state = $request->input('state');
    $formData->city = $request->input('city');

    
    $education = json_encode($request->input('education'));
    $formData->education = $education;

    
    if ($request->hasFile('profile_photo')) {
        $profilePhoto = $request->file('profile_photo');
        $profilePhotoPath = $profilePhoto->store('profile_photos', 'public');
        $formData->profile_photo = $profilePhotoPath;
    }


    $skills = json_encode($request->input('skills'));
    $formData->skills = $skills;

    
    if ($request->hasFile('certificates')) {
        $certificates = $request->file('certificates');
        $certificatePaths = [];
        foreach ($certificates as $certificate) {
            $certificatePath = $certificate->store('certificates', 'public');
            $certificatePaths[] = $certificatePath;
        }
        
        $certificatePathsJson = json_encode($certificatePaths);
        $formData->certificates = $certificatePathsJson;
    }

    $formData->profession = $request->input('profession');
    $formData->company_name = $request->input('company_name');
    $formData->job_started = $request->input('job_started');
    $formData->business_name = $request->input('business_name');
    $formData->location = $request->input('location');
    $formData->email = $request->input('email');
    $formData->mobile = $request->input('mobile');

    
    $formData->save();

    
    return redirect('/view');
    
    }



      function delete($id)
{
    $form = Laravelform::find($id);
    if (!$form) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    $form->delete();

    return redirect('/view')->with('success', 'Record deleted successfully.');
}



     function edit($id)
{
    $form = Laravelform::find($id);
    if (!$form) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    return view('edit', compact('form'));
}
function updateForm(Request $request)
{
    
    $formData = Laravelform::find($request->input('id'));
    if (!$formData) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    
    $formData->name = $request->input('name');
    $formData->birthday = $request->input('birthday');
    $formData->gender = $request->input('gender');
    $formData->state = $request->input('state');
    $formData->city = $request->input('city');
    

    $education = json_encode($request->input('education'));
    $formData->education = $education;
    
    
    if ($request->hasFile('profile_photo')) {
        $profilePhoto = $request->file('profile_photo');
        $profilePhotoPath = $profilePhoto->store('profile_photos', 'public');
        $formData->profile_photo = $profilePhotoPath;
    }
    
        $skills = json_encode($request->input('skills'));
    $formData->skills = $skills;
    
    
    if ($request->hasFile('certificates')) {
        $certificates = $request->file('certificates');
        $certificatePaths = [];
        foreach ($certificates as $certificate) {
            $certificatePath = $certificate->store('certificates', 'public');
            $certificatePaths[] = $certificatePath;
        }
    
        $certificatePathsJson = json_encode($certificatePaths);
        $formData->certificates = $certificatePathsJson;
    }
    
    $formData->profession = $request->input('profession');
    $formData->company_name = $request->input('company_name');
    $formData->job_started = $request->input('job_started');
    $formData->business_name = $request->input('business_name');
    $formData->location = $request->input('location');
    $formData->email = $request->input('email');
    $formData->mobile = $request->input('mobile');
    
    
    $formData->save();
    
    
    return redirect('/view')->with('success', 'Record updated successfully.');
}

}




