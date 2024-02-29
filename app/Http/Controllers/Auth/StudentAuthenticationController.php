<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $student = Student::create([
            'department_id' => $request->department_id,
            'registration_number' => $this->get_new_student_registration_number(),
            'full_name' => $request->full_name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'security' => $request->password,
            'guardian_name' => $request->guardian_name,
            'guardian_mobile' => $request->guardian_mobile,
            'address' => $request->address,
            'status' => "inactive"
        ]);

        Auth::guard('student')->login($student);

        return redirect('/student-panel/dashboard');
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
