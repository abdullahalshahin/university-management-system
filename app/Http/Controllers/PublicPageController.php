<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function faqs() {
        return view('faqs');
    }

    public function about_us() {
        return view('about_us');
    }

    public function contact_us() {
        return view('contact_us');
    }

    public function faculty_members($department_id) {
        $faculty_members = User::query()
            ->where('department_id', $department_id)
            ->get();

        return view('faculty_members', compact('faculty_members'));
    }
}
