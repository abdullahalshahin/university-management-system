<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ----------------------- public page route section ----------------------- //
Route::get('/', [PublicPageController::class, 'index']);
Route::get('/faqs', [PublicPageController::class, 'faqs']);
Route::get('/about-us', [PublicPageController::class, 'about_us']);
Route::get('/contact-us', [PublicPageController::class, 'contact_us']);

// ----------------------- ADMIN panel route section ----------------------- //
Route::middleware('auth')->group(function() {
    Route::prefix('admin-panel/dashboard')->group(function() {
        Route::get('/', [AdminControllers\DashboardController::class, 'index']);

        Route::resource('branches', AdminControllers\BranchController::class);
        Route::resource('courses', AdminControllers\CourseController::class);
        Route::resource('departments', AdminControllers\DepartmentController::class);
        Route::resource('semesters', AdminControllers\SemesterController::class);
        Route::resource('roles', AdminControllers\RoleController::class);
        Route::resource('students', AdminControllers\StudentController::class);
        Route::resource('users', AdminControllers\UserController::class);

        Route::post('semester-course-assign/{semester}', [AdminControllers\SemesterController::class, 'semester_cours_assign']);
        Route::get('assigned-semester-course/{semester_course}/edit', [AdminControllers\SemesterController::class, 'assigned_cours_assign']);
        Route::post('assigned-semester-course/{semester_course}/update', [AdminControllers\SemesterController::class, 'assigned_cours_assign_update']);
        Route::delete('unassign-semester-course/{semester_course}', [AdminControllers\SemesterController::class, 'unassign_semester_course']);

        Route::get('semesters/{semester}/participants', [AdminControllers\SemesterParticipantController::class, 'index']);
        Route::get('semesters/{semester}/participants/create', [AdminControllers\SemesterParticipantController::class, 'create']);
        Route::post('semesters/{semester}/participants/store', [AdminControllers\SemesterParticipantController::class, 'store']);
        Route::get('semesters/{semester}/participants/{student_id}/show', [AdminControllers\SemesterParticipantController::class, 'show']);
        Route::get('semesters/{semester}/participants/{student_id}/edit', [AdminControllers\SemesterParticipantController::class, 'edit']);
        Route::put('semesters/{semester}/participants/{student_id}/update', [AdminControllers\SemesterParticipantController::class, 'update']);
        Route::delete('semesters/{semester}/participants/{student_id}/delete', [AdminControllers\SemesterParticipantController::class, 'destroy']);

        Route::get('classroom', [AdminControllers\ClassRoomController::class, 'index']);
        Route::get('classroom/{semester_course}', [AdminControllers\ClassRoomController::class, 'show']);
        Route::post('classroom/{semester_course}/make-class', [AdminControllers\ClassRoomController::class, 'make_class']);

        Route::resource('questions', AdminControllers\QuestionController::class);
        Route::resource('exam-papers', AdminControllers\ExamPaperController::class);

        Route::get('exam-results', [AdminControllers\ResultController::class, 'index']);
        Route::get('exam-results/{exam_paper}', [AdminControllers\ResultController::class, 'show']);
        Route::get('exam-results/{exam_paper}/exam-participants/{exam_participant}', [AdminControllers\ResultController::class, 'show_exam_participant']);
        
        Route::get('exam-results/{exam_paper}/answer-papers/{exam_participant}', [AdminControllers\AnswerPaperController::class, 'show_answer_paper']);
        Route::post('exam-results/{exam_paper}/answer-papers/{exam_participant}/result-submit', [AdminControllers\AnswerPaperController::class, 'result_submit']);
        
        Route::get('my-account', [AdminControllers\ProfileController::class, 'my_account']);
        Route::get('my-account-edit', [AdminControllers\ProfileController::class, 'my_account_edit']);
        Route::put('my-account-update', [AdminControllers\ProfileController::class, 'my_account_update']);
        Route::post('users-change-status', [AdminControllers\UserController::class, 'users_change_status']);

        Route::get('system-settings', [AdminControllers\SystemSettingsController::class, 'index']);
        Route::post('email-gateway-update', [AdminControllers\SystemSettingsController::class, 'email_gateway_update']);
        Route::get('application-cache-clear', [AdminControllers\SystemSettingsController::class, 'application_cache_clear']);
    });
});

// ----------------------- STUDENT panel route section ----------------------- //
Route::prefix('student-panel')->group(function() {
    Route::get('/login', [Auth\StudentAuthenticationController::class, 'login']);
    Route::post('/login', [Auth\StudentAuthenticationController::class, 'login_store']);
    Route::get('/registration', [Auth\StudentAuthenticationController::class, 'registration']);
    Route::post('/registration', [Auth\StudentAuthenticationController::class, 'registration_store']);
    Route::get('/registration-verification', [Auth\StudentAuthenticationController::class, 'registration_verification']);
    Route::post('/registration-verification', [Auth\StudentAuthenticationController::class, 'registration_verification_store']);
    Route::get('/forgot-password', [Auth\StudentAuthenticationController::class, 'forgot_password']);
    Route::post('/forgot-password', [Auth\StudentAuthenticationController::class, 'forgot_password_store']);

    Route::middleware('auth:student')->group(function() {
        Route::prefix('dashboard')->group(function() {
            Route::get('/', [StudentControllers\DashboardController::class, 'index']);

            Route::get('registered-courses', [StudentControllers\CourseRegistrationController::class, 'registered_courses']);
            Route::get('new-registration', [StudentControllers\CourseRegistrationController::class, 'new_registration']);
            Route::get('new-registration-store/{semester}', [StudentControllers\CourseRegistrationController::class, 'new_registration_store']);

            Route::get('classroom', [StudentControllers\ClassRoomController::class, 'index']);
            Route::get('classroom/{semester_course}', [StudentControllers\ClassRoomController::class, 'show']);

            Route::get('exams', [StudentControllers\ExamController::class, 'index']);
            Route::get('exams/{exam}', [StudentControllers\ExamController::class, 'create']);
            Route::post('exams/{exam}', [StudentControllers\ExamController::class, 'store']);
            Route::get('exams/{exam}/result', [StudentControllers\ExamController::class, 'show_result']);

            Route::get('my-account', [StudentControllers\ProfileController::class, 'my_account']);
            Route::get('my-account-edit', [StudentControllers\ProfileController::class, 'my_account_edit']);
            Route::put('my-account-update', [StudentControllers\ProfileController::class, 'my_account_update']);
            Route::post('/my-account-log-out', [Auth\StudentAuthenticationController::class, 'log_out']);
        });
    });
});

require __DIR__.'/auth.php';
