<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\skregisterController;
use App\Http\Controllers\dnrRegisterController;
use App\Http\Controllers\addAdminController;
use App\Http\Controllers\bloodRequestController;
use App\Http\Controllers\donorReq;
use App\Http\Controllers\donorRequestController;
use App\Http\Controllers\donorViewseeker;
use App\Http\Controllers\listofApproved;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\addBloodController;

use App\Http\Controllers\viewBloodStore;
use App\Http\Controllers\discardBloodControlle;
use App\Http\Controllers\hospitalRequestController;
use App\Http\Controllers\viewStatusDonor;
use App\Http\Controllers\deleteC;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\adminnotificationController;
use App\Http\Controllers\donorController;
use App\Http\Controllers\healthinstituteController;
use App\Http\Controllers\nurseController;
use App\Http\Controllers\techController;
use Illuminate\Support\Facades\Auth;
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
    return view('Test');
});

Route::view('aa', 'Test');
Route::get('bb', function () {
    return view('admin.newjquery');
});

Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-role:donor'])->group(function () {

    Route::get('/donor/home', [HomeController::class, 'donorHome'])->name('donor.home');
    //Route::get('/donor/home', [donorController::class, 'getAdvertise'])->name('donor.home');
    // Route::view('donor/newhome', 'donor.home');
    Route::post('donor/donorregister', [donorController::class, 'register']);
    Route::view('donor/donorregister', 'donor.Register');
    Route::view('donor/reservation', 'donor.Reservation');
    Route::post('/donor/reservation/{id}', [donorController::class, 'reservation']);
    Route::get('/donor/history/{id}', [donorController::class, 'history']);
    Route::get('/donor/reservationhistory/{id}', [donorController::class, 'reservationHistory']);

    Route::view('/donor/insert', 'donor.profileInsert');
    Route::post('/donor/insertprofiles', [donorController::class, 'insertprofile']);
    Route::get('/donor/profile/{id}', [donorController::class, 'Profile']);
    Route::post('/donor/updateprofile/{id}', [donorController::class, 'updateProfile']);
    Route::post('/donor/updatephoto/{id}', [donorController::class, 'updatephoto']);

    Route::view('donor/view', 'donor.viewP');
    Route::get('donor/seeker', [donorController::class, 'view']);
    // Route::get('donor/seeker', [donorViewseeker::class, 'viewS']);
    Route::post('/donor/comment', [donorController::class, 'comments']);

    Route::get('donor/blog', [donorController::class, 'viewblog']);
    //Route::view('donor/viewseeker', 'donor.viewSeekers');
    // Route::get('donor/views', [donorViewseeker::class, 'viewS']);
    // Route::get('/donor/viewdetail/{id}', [donorViewseeker::class, 'viewdetail']);
    // Route::get('donor/searchseeker', [donorViewseeker::class, 'search']);
    // Route::view('donor/seekerpost', 'user.seekerspost');
    // Route::view('donor/seeker', 'donor.viewseeker');

    // Route::view('donor/history', 'donor.history');
    //Route::get('/donor/history/{{id}}', [donorController::class, 'history']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-role:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'dashboard'])->name('admin.home');
    Route::get('/admin/send/{id}', [adminnotificationController::class, 'sendnotification']);
    Route::get('/admin/home', [AdminController::class, 'bloodavailability'])->name('admin.home');
    Route::get('/admin/aa', [AdminController::class, 'aa']);
    Route::view('/admin/user', 'admin.block_user');
    Route::get('/admin/user', [AdminController::class, 'index']);
    Route::post('/ admin.block/{id}', [AdminController::class, 'blocks']);
    //Route::view('/admin/aa', 'admin.navbar');
    //users  Notification1
    Route::view('/admin/add', 'admin.addUser');
    Route::post('/admin/add', [AdminController::class, 'register']);

    Route::get('/admin/viewdonor', [AdminController::class, 'getDonors']);
    Route::patch('/admin/updatedonor/{id}', [AdminController::class, 'updateDonor']);
    Route::delete('/admin/deletedonor/{id}', [AdminController::class, 'deleteDonor']);

    Route::get('/admin/viewnurse', [AdminController::class, 'getNurse']);
    Route::patch('/admin/updatenurse/{id}', [AdminController::class, 'updateNurse']);
    Route::delete('/admin/deletenurse/{id}', [AdminController::class, 'deleteNurse']);

    Route::get('/admin/viewtech', [AdminController::class, 'getTech']);
    Route::patch('/admin/updatetech/{id}', [AdminController::class, 'updateTech']);
    Route::delete('/admin/deletetech/{id}', [AdminController::class, 'deleteTech']);

    Route::get('/admin/viewhi', [AdminController::class, 'getHI']);
    Route::patch('/admin/updatehi/{id}', [AdminController::class, 'updateHI']);
    Route::delete('/admin/deletehi/{id}', [AdminController::class, 'deleteHI']);

    //Route::get('/admin/display', [donorReq::class, 'display']);
    // Route::get('/admin/displayapproved', [donorReq::class, 'displayapproved']);
    // Route::view('/admin/hospitalrequest', 'admin.hospitalRequest');
    Route::get('/admin/hospitalrequest', [hospitalRequestController::class, 'viewHospitalRequest']);

    Route::get('/admin/approved/{id}', [hospitalRequestController::class, 'approved']);
    Route::get('/admin/canceled/{id}', [hospitalRequestController::class, 'canceled']);
    Route::post('/admin/sendb/{id}', [AdminController::class, 'send']);
    Route::get('/admin/read/{id}', [AdminController::class, 'read']);


    Route::get('/admin/users/{id}', [hospitalRequestController::class, 'show']);

    Route::get('/admin/sendtoTechnician', [hospitalRequestController::class, 'adminmessageT']);

    Route::view('/admin/viewnewusers', 'admin.viewNewUser');
    Route::get('/admin/viewnewusers', [AdminController::class, 'viewnew_user']);

    // Route::get('/admin/donorpermision/{id}', [AdminController::class, 'donorPermision']);
    // Route::get('/admin/nursepermision/{id}', [AdminController::class, 'nursePermision']);
    // Route::get('/admin/technicianpermision/{id}', [AdminController::class, 'technicianPermision']);
    //Route::get('/admin/healthpermision/{id}', [AdminController::class, 'healthPermision']);

    Route::get('/admin/usernotification', [AdminController::class, 'userNotification']);


    //Route::post('/admin/notification', [hospitalRequestController::class, 'sendNotification']);
    //Route::get('/admin/notification', [AdminController::class, 'showNotificaton']);
    #Notification mark as Read

    //Route::post('/admin/mark-as-read',[AdminController::class, 'markNotification'])->name('markNotification');
});

Route::middleware(['auth', 'user-role:nurse'])->group(function () {
    Route::get('/nurse/home', [HomeController::class, 'nurseHome'])->name('nurse.home');
    // Route::view('/nurse/newhome', 'nurse.home');
    Route::view('/nurse/profile', 'nurse.profile');
    Route::view('/nurse/insert', 'nurse.insertProfile');
    Route::post('/nurse/insertprofiles', [nurseController::class, 'insertprofile']);
    Route::post('/nurse/updateprofile/{id}', [nurseController::class, 'updateProfile']);
    Route::post('/nurse/updatephoto/{id}', [nurseController::class, 'updatephoto']);
    Route::get('/nurse/profile/{id}', [nurseController::class, 'Profile']);

    Route::view('/nurse/advertise', 'nurse.advertise');
    Route::post('/nurse/advertise', [nurseController::class, 'advertise']);
    Route::get('/nurse/display', [donorReq::class, 'display']);
    Route::get('/nurse/displayapproved', [donorReq::class, 'displayapproved']);
    Route::get('/nurse/viewdetail/{id}', [donorReq::class, 'viewdetail']);

    Route::get('/nurse/approved/{id}', [donorReq::class, 'approved']);
    Route::get('/nurse/canceled/{id}', [donorReq::class, 'canceled']);
    Route::delete('/nurse/delete/{id}', [donorReq::class, 'delete']);

    Route::get('/nurse/listofapproved', [nurseController::class, 'displayapproved']);
    Route::get('/nurse/home', [nurseController::class, 'displayA'])->name('nurse.home');

    Route::view('/nurse/reservation', 'nurse.reserationManagement');
    Route::get('/nurse/reservation', [nurseController::class, 'manageReservation']);
    Route::delete('/nurse/deletereservation/{id}', [nurseController::class, 'deleteRes']);
    Route::get('/nurse/accept/{id}', [nurseController::class, 'accept']);
    Route::get('/nurse/notaccept/{id}', [nurseController::class, 'notAccept']);
    Route::patch('/nurse.changereservation/{id}', [nurseController::class, 'changeReservation']);
});
Route::middleware(['auth', 'user-role:technitian'])->group(function () {
    Route::get('/technitian/home', [HomeController::class, 'technitanHome'])->name('technitian.home');
    Route::view('/technitian/addbloods', 'technitian.addBlood');
    Route::post('/technitian/addbloods', [addBloodController::class, 'addblood']);

    Route::get('/technitian/home', [viewBloodStore::class, 'viewblood'])->name('technitian.home');
    Route::get('/technitian/viewstoredblood', [techController::class, 'view']);
    Route::view('technitian/discardblood', 'technitian.discardBlood');
    Route::post('/technitian/discardblood', [discardBloodControlle::class, 'discardblood']);
    Route::view('technitian/distributeblood', 'technitian.distributeBlood');
    Route::get('/technitian/distributetohospital', [discardBloodControlle::class, 'distribute']);
    // Route::get('/technitian/setexpaired', [discardBloodControlle::class, 'distribute']);
    Route::get('/technitian/read/{id}', [techController::class, 'read']);
    Route::get('/technitian/discard2/{id}', [techController::class, 'discard']);
    //  Route::view('technitian/distributetohospital', 'technitian.distributeToHospital');
    // Route::view('technitian/savedistribute', 'technitian.distributeBlood');
    Route::post('/technitian/filldiscard', [techController::class, 'filldiscard']);
    Route::post('/technitian/savedistribute', [discardBloodControlle::class, 'saveddistribute']);
    //Route::get('/technitian/notification', [HomeController::class, 'sendOfferNotification']);
});

Route::middleware(['auth', 'user-role:healthinstitute'])->group(function () {
    Route::get('/healthinstitute/home', [HomeController::class, 'healthinstituteHome'])->name('healthinstitute.home');
    Route::view('/healthinstitute/seekerRegister', 'healthinstitute.postSeeker');
    Route::view('/healthinstitute/profile', 'healthinstitute.profile');
    Route::post('/healthinstitute/profile', [healthinstituteController::class, 'profile']);
    Route::post('/healthinstitute/seekerRegister', [bloodRequestController::class, 'bloodrequest']);
    Route::view('/healthinstitute/post', 'healthinstitute.hospitalPost');
    Route::post('/healthinstitute/post', [bloodRequestController::class, 'postSeeker']);
    Route::post('/healthinstitute/hospitalrequest', [hospitalRequestController::class, 'hospitalreq']);

    Route::view('/healthinstitute/hospitalrequest', 'healthinstitute.bloodRequestform');

    Route::get('/healthinstitute/request/{id}', [hospitalRequestController::class, 'viewrequest']);

    Route::view('/healthinstitute/finddonor', 'healthinstitute.findDonor');
    Route::post('/healthinstitute/search', [hospitalRequestController::class, 'search']);
});
