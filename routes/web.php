<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Staff\StaffDashboardController;

Route::get('/not-found', [FrontendController::class, 'notFound'])->name('notFound');
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/service', [FrontendController::class, 'service'])->name('service');
Route::get('/admission', [FrontendController::class, 'admission'])->name('admission');
Route::get('/academics', [FrontendController::class, 'academics'])->name('academics');
Route::get('/event', [FrontendController::class, 'event'])->name('event');
Route::get('/event/view/{slug}', [FrontendController::class, 'eventView'])->name('event_view');
Route::get('/news', [FrontendController::class, 'news'])->name('news');
Route::get('/guideline', [FrontendController::class, 'guideline'])->name('guideline');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [FrontendController::class, 'contactSubmit'])->name('contact.submit');
// Route::get('/event', [FrontendController::class, 'event'])->name('academics');
Route::get('/staff/login', [AuthController::class, 'staffLogin'])->name('staff_login');
Route::post('/staff/submit', [AuthController::class, 'staffLoginSubmit'])->name('staff_login_submit');
Route::get('/staff/forget', [AuthController::class, 'staffForget'])->name('staff_forget_password');
Route::get('/staff/register', [AuthController::class, 'staffRegister'])->name('staff_register');


Route::get('/student/login', [AuthController::class, 'studentLogin'])->name('student_login');
Route::get('/admin/login', [AuthController::class, 'adminLogin'])->name('admin_login');
Route::post('/admin/submit', [AuthController::class, 'adminLoginSubmit'])->name('admin_login_submit');
Route::get('/admin/forget', [AuthController::class, 'adminForget'])->name('admin_forget_password');


Route::middleware('admin')->prefix('admin')->group(function () {

Route::get('/', [DashboardController::class, 'index'])->name('admin_dashboard');
Route::get('profile', [DashboardController::class, 'admin_profile'])->name('admin_profile');
Route::get('logout', [DashboardController::class, 'admin_logout'])->name('admin_logout');
Route::get('change/password', [DashboardController::class, 'change_password'])->name('admin_change_password');
Route::post('change/password', [DashboardController::class, 'change_password_submit'])->name('admin_change_password_submit');

Route::get('/class', [ClassController::class, 'index'])->name('admin_class');
Route::get('/subject', [SubjectController::class, 'index'])->name('admin_subject');
Route::get('/event', [EventController::class, 'index'])->name('admin_event');
Route::get('/event/create', [EventController::class, 'create'])->name('admin_event_create');
Route::post('/event/store', [EventController::class, 'store'])->name('admin_event_store');
Route::get('/event/view/{event}', [EventController::class, 'view'])->name('admin_event_view');
Route::get('/news', [NewsController::class, 'index'])->name('admin_news');
Route::get('/news/create', [NewsController::class, 'create'])->name('admin_news_create');
Route::post('/news/store', [NewsController::class, 'store'])->name('admin_news_store');
Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
Route::get('/news/view/{event}', [NewsController::class, 'view'])->name('admin_news_view');
Route::get('/student', [StudentController::class, 'index'])->name('admin_student');
Route::get('/staff', [StaffController::class, 'index'])->name('admin_staff');
Route::get('/gallery', [GalleryController::class, 'index'])->name('admin_gallery');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('admin_gallery_create');
Route::get('/gallery/edit', [GalleryController::class, 'edit'])->name('admin_gallery_edit');
Route::get('/contact', [ContactController::class, 'index'])->name('admin_contact');
Route::get('/admission', [AdmissionController::class, 'index'])->name('admin_admission');

});


Route::middleware('staff')->prefix('staff')->group(function () {
    Route::get('/', [StaffDashboardController::class, 'index'])->name('staff_dashboard');
Route::get('profile', [StaffDashboardController::class, 'staff_profile'])->name('staff_profile');
Route::get('logout', [StaffDashboardController::class, 'staff_logout'])->name('staff_logout');
Route::get('change/password', [StaffDashboardController::class, 'change_password'])->name('staff_change_password');
Route::post('change/password', [StaffDashboardController::class, 'change_password_submit'])->name('staff_change_password_submit');
});

Route::middleware('student')->group(function () {
    // Route::get('/student/dashboard', StudentDashboard::class);
});
