<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\StudentVerificationMail;
use App\Models\Department;
use App\Models\Student;
use App\Models\StudentVerification;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentAuthenticationController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function login() {
        return view('auth.student_login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login_store(Request $request) {
        $credentials = $request->only('email', 'password');

        $student = Student::query()
            ->where('email', $request->mobile_number_or_email)
            ->first();

        if ($student && $student->status != "active") {
            return abort(403, 'Access Denied');
        }

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->intended(RouteServiceProvider::STUDENT_HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function registration() {
        $departments = Department::query()
            ->where('status', "active")
            ->get(['id', 'code', 'name']);

        return view('auth.student_registration', compact('departments'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registration_store(Request $request) {
        $request->validate([
            'department_id' => ['required', 'numeric'],
            'full_name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:255', 'unique:students'],
            'email' => ['required', 'string', 'max:255', 'unique:students'],
            'password' => ['required', 'confirmed'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_mobile' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $student = Student::where('email', $request->email)->first();

        if (!$student) {
            $otp = StudentVerification::save_and_get_otp($request->email);

            $data = [
                'to' => $request->email,
                'student_name' => $request->full_name,
                'subject' => "Verification Email",
                'body' => "Your OTP code : {$otp}",
            ];

            Mail::to($data['to'])->send(new StudentVerificationMail($data));
        }

        $student = [
            'department_id' => $request->department_id,
            'full_name' => $request->full_name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => $request->password,
            'security' => $request->password,
            'guardian_name' => $request->guardian_name,
            'guardian_mobile' => $request->guardian_mobile,
            'address' => $request->address
        ];

        return redirect()->to('/student-panel/registration-verification')
                ->with('student', $student);
    }

    public function registration_verification(Request $request) {
        $student = $request->session()->get('student');

        if ($student) {
            return view('auth.student_registration_verification', compact('student'));
        }
        else {
            return redirect()->to('/student-panel/registration')
                ->with('error', 'Student data not found in the request.');
        }
    }

    public function registration_verification_store(Request $request) {
        $request->validate([
            'student' => ['required', 'array'],
            'otp_code' => ['required', 'regex:/^[0-9]+$/'],
        ]);

        $verification_code = StudentVerification::where('email', $request->student['email'])
            ->where('otp', $request->otp_code)
            ->where('otp_expire_time', '>', now())
            ->first();

        if (!$verification_code) {
            return redirect()->to('/student-panel/registration-verification')
                ->with('student', $request->student)
                ->with('error', "Code Does Not Matched!!!");
        }

        $student = Student::create([
            'department_id' => $request->student['department_id'],
            'registration_number' => $this->get_new_student_registration_number(),
            'full_name' => $request->student['full_name'],
            'mobile_number' => $request->student['mobile_number'],
            'email' => $request->student['email'],
            'password' => Hash::make($request->student['password']),
            'security' => $request->student['password'],
            'guardian_name' => $request->student['guardian_name'],
            'guardian_mobile' => $request->student['guardian_mobile'],
            'address' => $request->student['address'],
            'status' => "inactive"
        ]);

        return redirect('/student-panel/login');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function log_out(Request $request) {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
