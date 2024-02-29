<?php

namespace App\Http\Controllers\StudentControllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function my_account(Request $request) {
        $student = $request->user();

        return view('student_panel.my_account.index', compact('student'));
    }
    
    public function my_account_edit(Request $request) {
        $student = $request->user();

        return view('student_panel.my_account.edit', compact('student'));
    }

    public function my_account_update(Request $request) {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'confirmed'],
            'guardian_name' => ['nullable', 'string', 'max:255'],
            'guardian_mobile' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'biography' => ['nullable', 'string', 'max:255'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
        ]);

        $student = $request->user();

        if ($profile_image = $request->file('profile_image')) {
            $extension = $profile_image->getClientOriginalExtension();

            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                $destination_path = 'images/students/';
                $profile_image_name = date('YmdHis') . "." . $profile_image->getClientOriginalExtension();
                $profile_image->move($destination_path, $profile_image_name);
                $profile_image_name = "$profile_image_name";
            }
            else {
                $profile_image_name = NULL;
            }
        }

        $student_data = Student::find($student->id);
        
        $student_data->update([
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'security' => $request->password,
            'guardian_name' => $request->guardian_name,
            'guardian_mobile' => $request->guardian_mobile,
            'address' => $request->address,
            'biography' => $request->biography,
            'profile_image' => ($request->file('profile_image')) ? $profile_image_name : $student_data->profile_image,
        ]);

        return redirect()->to('student-panel/dashboard/my-account')
            ->with('success', "Profile Update Successfully!!!");
    }

    public function my_account_delete(Request $request) {
        $student = $request->user();

        Student::find($student->id)->delete();

        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
