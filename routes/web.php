<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\NewPasswordController;

use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\RoutineXIController;
use App\Http\Controllers\Admin\RoutineXIIController;

use App\Http\Controllers\Admin\Students\AllStudentsController;
use App\Http\Controllers\Admin\Students\XIStudentsController;
use App\Http\Controllers\Admin\Students\XIIStudentsController;
use App\Http\Controllers\Admin\Students\OldStudentsController;
use App\Http\Controllers\Admin\Students\HscExamineeController;

use App\Http\Controllers\Admin\Exam\ExamController;
use App\Http\Controllers\Admin\Exam\HscController;

use App\Http\Controllers\Admin\Teachers\TeachersController;
use App\Http\Controllers\Admin\Teachers\DeptTeachersController;

use App\Http\Controllers\Admin\Admission\SecurityCodeController;
use App\Http\Controllers\Admin\Admission\AdmissionController;

use App\Http\Controllers\Admin\Download\IDcardController;
use App\Http\Controllers\Admin\Download\TestimonialController;
use App\Http\Controllers\Admin\Download\TransCertController;

use App\Http\Controllers\User\NoticeViewController;

use App\Http\Controllers\User\Posts\PostsController;
use App\Http\Controllers\User\Posts\LikesController;
use App\Http\Controllers\User\Posts\CommentsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function() {
    //__Home routes
    Route::get('/home', [UserController::class, 'index'])->name('home');

    //__Change password
    Route::post('/user_password/update', [NewPasswordController::class, 'password_update'])->name('user_password.update');

    //__User profile routes
    Route::get('profile/{id}', [UserController::class, 'profile'])->name('user.profile');

    //__Notice routes
    Route::get('/notice', [NoticeViewController::class, 'index'])->name('notice.view');

    //__Post routes
    Route::resource('/posts', PostsController::class);
    Route::resource('/posts/like', LikesController::class);
    Route::resource('/posts/comment', CommentsController::class);

    //__Videos route
    Route::get('/videos', [UserController::class, 'videos'])->name('videos');



    //__Teachers and students info route
    Route::get('/teacher_student_info', [UserController::class, 'teacher_student_view'])->name('teacher_student_info');

});



require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');
Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    Route::get('/admin/password/change', [HomeController::class, 'password_change'])->name('admin.password.change');
    Route::post('/admin/password/update', [HomeController::class, 'password_update'])->name('admin.password.update');

    // __Notice routes
    Route::resource('/admin/notice', NoticeController::class);


    // __Student routes
    Route::resource('/admin/students', AllStudentsController::class);
    Route::resource('/admin/students_xi', XIStudentsController::class);
    Route::resource('/admin/students_xii', XIIStudentsController::class);
    Route::resource('/admin/students_old', OldStudentsController::class);
    Route::get('/admin/students/transfer-class/{id}', [AllStudentsController::class, 'transfer_class'])->name('students.transfer-class');


    // __Teacher routes
    Route::resource('/admin/teachers', TeachersController::class);
    Route::get('/admin/teachers-science', [DeptTeachersController::class, 'science'])->name('admin.teachers-science');
    Route::get('/admin/teachers-humanities', [DeptTeachersController::class, 'humanities'])->name('admin.teachers-humanities');
    Route::get('/admin/teachers-business', [DeptTeachersController::class, 'business'])->name('admin.teachers-business');



});
