<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------e----------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LoginController::class,'index'])->name("login");
Route::post('/login', [LoginController::class,'login'])->name('loginpost');
Route::get('/forgotpassword', [LoginController::class,'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpasswordpost', [LoginController::class,'forgotpasswordpost'])->name('forgotpasswordpost');
Route::get('/forgetpassword', [LoginController::class,'forgetpassword'])->name('forgetpassword');
Route::post('/forgetpasswordpost', [LoginController::class,'forgetpasswordpost'])->name('forgetpasswordpost');
Route::get("/signout",[LoginController::class,'signout'])->name("signout");

Route::prefix("yonetici")->middleware("adminverified")->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name("admin");
    Route::get('/ogrenci', [AdminController::class, 'student'])->name("adminstudent");
    Route::post('/ogrenci/ekle', [AdminController::class, 'addStudent'])->name('addStudentPost');
    Route::post('/ogrenci/guncelle', [AdminController::class, 'updateStudent'])->name('updateStudentPost');
    Route::post('/ogrenci/sil', [AdminController::class, 'deleteStudent'])->name('deleteStudentPost');
    Route::post('/ogrenci/ara', [AdminController::class, 'searchStudent'])->name('searchStudentPost');
    Route::get('/danisman', [AdminController::class, 'teacher'])->name('adminteacher');
    Route::post('/danisman/ekle', [AdminController::class, 'addTeacher'])->name('addTeacherPost');
    Route::post('/danisman/guncelle', [AdminController::class, 'updateTeacher'])->name('updateTeacherPost');
    Route::post('/danisman/sil', [AdminController::class, 'deleteTeacher'])->name('deleteTeacherPost');
    Route::post('/danisman/ara', [AdminController::class, 'searchTeacher'])->name('searchTeacherPost');
    Route::post('/danisman/listele', [AdminController::class, 'listTeacher'])->name('teacherlistpost');
    Route::get('/danismanata', [AdminController::class, 'assignTeachers'])->name('adminteacherassign');
    Route::get('/donem/{id?}', [AdminController::class, 'period'])->name('adminperiod');
    Route::get('/universite', [AdminController::class, 'univercity'])->name('adminunivercity');
    Route::post('/universite/bolum/ekle', [AdminController::class, 'branchadd'])->name('branchaddpost');
    Route::post('/universite/bolum/listele', [AdminController::class, 'branchlist'])->name('branchlistpost');
    Route::post('/universite/fakulte/ekle', [AdminController::class, 'facultyadd'])->name('facultyaddpost');
    Route::post('/donem/add', [AdminController::class, 'addperiod'])->name('periodsaddpost');
    Route::post('/donem/active', [AdminController::class, 'activeperiod'])->name('periodsactivepost');

});

Route::prefix("ogrenci")->middleware("studentverified")->group(function (){
    Route::get('/', [StudentController::class, 'index'])->name('student');
    Route::post('/projeoner', [StudentController::class, 'suggestproject'])->name('studentsuggestproject');
    Route::post('/projebenzerlik', [StudentController::class, 'similarproject'])->name('studentsimilarproject');
    Route::post('/raporyukle', [StoreController::class, 'uploadreport'])->name('studentuploadreport');
    Route::post('/tezyukle', [StoreController::class, 'uploadthesis'])->name('studentuploadthesis');
    Route::get('/proje/{id}', [StudentController::class, 'detailproject'])->name('studentdetailproject');
    Route::get('/proje/kategori/{id}',[StudentController::class,"statusListProject"])->name("studentliststatusproject");
    Route::get('/bildirimler',[StudentController::class,"notifications"])->name("studentnotification");
    Route::post('/bildirimler/goruldu',[StudentController::class,"notificationeyes"])->name("studentnotificationeyes");

});


Route::prefix("danisman")->middleware("teacherverified")->group(function (){
    Route::get('/', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/ogrenci', [TeacherController::class, 'mystudent'])->name('mystudent');
    Route::post('/ogrenci/proje/islem', [TeacherController::class, 'verifiedproject'])->name('teacherverifiedproject');
});

Route::middleware("userverified")->group(function(){
    Route::get("/indir",[StoreController::class,'download'])->name("download");
    Route::post('/anahtarkelime', [KeywordController::class, 'keywordproject'])->name('keywordproject');
    Route::get("/profil",[ProfileController::class,'index'])->name("editprofile");
    Route::post("/profilduzenle",[ProfileController::class,'editprofile'])->name("editprofileedit");
    Route::post("/profilduzenlesifre",[ProfileController::class,'editprofilepass'])->name("editprofileeditpass");
    Route::post("/profilduzenleresim",[StoreController::class,'uploadimg'])->name("editprofileeditresim");
    Route::get('/image', [StoreController::class,'displayImage']);
    Route::get('/ogrenci/{id}', [TeacherController::class, 'detailstudent'])->name('detailstudent');
    Route::get('/ogrenci/{id}/proje/kategori/{no}',[TeacherController::class,"statusListProject"])->name("teacherstudentliststatusproject");
    Route::get('/projeler', [TeacherController::class,'detailprojects'])->name('detailprojects');
    Route::get('/proje/{no}', [TeacherController::class, 'detailproject'])->name('teacherdetailproject');
    Route::get('/projeler/kategori/{id}',[TeacherController::class,"statusListProjects"])->name("liststatusprojects");

});

Route::get('/401', function () {
    return view('error.401');
})->name("401");
