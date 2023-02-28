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
use App\Http\Controllers\bbManagerController;
use App\Http\Controllers\encoderController;
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
    return view('HomePage');
});
Route::view('create_account', 'createAccount');
Route::post('create_acc', [donorController::class, 'createAccount']);

Route::view('about', 'aboutus');


Route::get('bb', function () {
    return view('index');
});

Route::group(['middleware' => 'prevent-back-history'], function () {




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
        //Route::view('donor/reservation', 'donor.Reservation');
        Route::get('/donor/reservationform', [donorController::class, 'ReservationForm']);
        Route::post('/donor/reservation/{id}', [donorController::class, 'reservation']);
        Route::get('/donor/history/{id}', [donorController::class, 'history']);
        Route::get('/donor/reservationhistory/{id}', [donorController::class, 'reservationHistory']);

        Route::view('/donor/insert', 'donor.profileInsert');
        Route::post('/donor/insertprofiles', [donorController::class, 'insertprofile']);
        Route::get('/donor/profile/{id}', [donorController::class, 'Profile']);
        Route::post('/donor/updateprofile/{id}', [donorController::class, 'updateProfile']);
        Route::post('/donor/updatephoto/{id}', [donorController::class, 'updatephoto']);
        Route::post('/donor/changepassword', [donorController::class, 'changepassword']);

        Route::view('donor/view', 'donor.viewP');
        Route::get('donor/seeker', [donorController::class, 'view']);
        // Route::get('donor/seeker', [donorViewseeker::class, 'viewS']);
        Route::post('/donor/comment', [donorController::class, 'comments']);

        Route::get('donor/news', [donorController::class, 'viewNews']);
        Route::get('donor/information', [donorController::class, 'viewInfo']);
        Route::get('donor/feedback', [donorController::class, 'feedbacks']);
        Route::post('/donor/givefeedbak', [donorController::class, 'givefeedbacks']);

        Route::view('donor/aboutus', 'donor.aboutus');
        Route::view('donor/blood', 'donor.bloodtype');
    });

    /*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
    Route::middleware(['auth', 'user-role:admin'])->group(function () {
        Route::get('/admin/home', [HomeController::class, 'dashboard'])->name('admin.home');
        //  Route::get('/admin/send/{id}', [adminnotificationController::class, 'sendnotification']);
        Route::get('/admin/home', [AdminController::class, 'bloodavailability'])->name('admin.home');

        Route::post('/admin/search_user', [AdminController::class, 'searchUser']);
        Route::get('/admin/alluser', [AdminController::class, 'getUser']);
        Route::patch('/admin/updateuser/{id}', [AdminController::class, 'updateTech']);
        Route::delete('/admin/deleteuser/{id}', [AdminController::class, 'deleteTech']);


        Route::get('/admin/aa', [AdminController::class, 'aa']);
        Route::view('/admin/user', 'admin.block_user');
        Route::get('/admin/user', [AdminController::class, 'index']);
        Route::post('/ admin.block/{id}', [AdminController::class, 'blocks']);
        //Route::view('/admin/aa', 'admin.navbar');
        //users  Notification1

        Route::get('/admin/img', [AdminController::class, 'imgup']);
        Route::post('/admin/imgs', [AdminController::class, 'imgups']);
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
        Route::get('/admin/profile/{id}', [AdminController::class, 'Profile']);
        Route::post('/admin/updateprofile/{id}', [AdminController::class, 'updateProfile']);
        Route::post('/admin/updatephoto/{id}', [AdminController::class, 'updatephoto']);
    });

    Route::middleware(['auth', 'user-role:nurse'])->group(function () {

        Route::get('/nurse/home', [HomeController::class, 'nurseHome'])->name('nurse.home');
        // Route::view('/nurse/newhome', 'nurse.home');
        Route::get('/nurse/profile/{id}', [nurseController::class, 'Profile']);
        Route::post('/nurse/updateprofile/{id}', [nurseController::class, 'updateProfile']);
        Route::post('/nurse/updatephoto/{id}', [nurseController::class, 'updatephoto']);
        Route::post('/nurse/changepassword', [nurseController::class, 'changepassword']);

        Route::view('/nurse/enroll', 'nurse.registerDonor');
        Route::post('/nurse/enrolldonor', [nurseController::class, 'enrollDonor']);
        Route::get('/nurse/notify', [nurseController::class, 'notifys']);
        Route::get('/nurse/send/{id}', [nurseController::class, 'sendnotification']);

        Route::view('/nurse/advertise', 'nurse.advertise');
        Route::post('/nurse/advertise', [nurseController::class, 'advertise']);
        Route::get('/nurse/display', [donorReq::class, 'display']);
        Route::get('/nurse/displayapproved', [donorReq::class, 'displayapproved']);
        Route::get('/nurse/viewdetail/{id}', [donorReq::class, 'viewdetail']);

        Route::get('/nurse/approved/{id}', [donorReq::class, 'approved']);
        Route::get('/nurse/canceled/{id}', [donorReq::class, 'canceled']);
        Route::delete('/nurse/delete/{id}', [donorReq::class, 'delete']);

        Route::get('/nurse/listofapproved', [nurseController::class, 'displayapproved']);
        Route::get('/nurse/home', [nurseController::class, 'ReturntoHome'])->name('nurse.home');

        Route::view('/nurse/reservation', 'nurse.reserationManagement');
        Route::get('/nurse/reservation', [nurseController::class, 'manageReservation']);
        Route::delete('/nurse/deletereservation/{id}', [nurseController::class, 'deleteRes']);
        Route::get('/nurse/accept/{id}', [nurseController::class, 'accept']);
        Route::get('/nurse/notaccept/{id}', [nurseController::class, 'notAccept']);
        Route::patch('/nurse.changereservation/{id}', [nurseController::class, 'changeReservation']);

        Route::post('/nurse/donorbybloodtype', [nurseController::class, 'search_donors']);
        Route::post('/nurse/datetonotify', [nurseController::class, 'DaystoNotify']);

        Route::get('/nurse/listofdonor', [nurseController::class, 'listofDonor']);
        Route::post('/nurse/search_donor', [nurseController::class, 'searchDonor']);
        Route::get('/nurse/registordon/{id}', [nurseController::class, 'getDonor']);
    });
    Route::middleware(['auth', 'user-role:technitian'])->group(function () {

        Route::get('/technitian/home', [HomeController::class, 'technitanHome'])->name('technitian.home');

        Route::get('/technitian/expired', [techController::class, 'ExpiredBlood']);
        Route::get('/technitian/profile/{id}', [techController::class, 'Profile']);
        Route::post('/technitian/updateprofile/{id}', [techController::class, 'updateProfile']);
        Route::post('/technitian/updatephoto/{id}', [techController::class, 'updatephoto']);
        Route::post('/technitian/changepassword', [techController::class, 'changepassword']);

        Route::view('/technitian/addbloods', 'technitian.addBlood');
        Route::post('/technitian/addbloods', [techController::class, 'addblood']);

        Route::get('/technitian/home', [techController::class, 'viewblood'])->name('technitian.home');
        Route::get('/technitian/viewstoredblood', [techController::class, 'view']);
        Route::view('technitian/discardblood', 'technitian.discardBlood');
        Route::post('/technitian/discardblood', [techController::class, 'discardblood']);
        Route::view('technitian/distributeblood', 'technitian.distributeBlood');
        Route::get('/technitian/distributetohospital', [techController::class, 'distribute']);
        // Route::get('/technitian/setexpaired', [discardBloodControlle::class, 'distribute']);
        Route::get('/technitian/read/{id}', [techController::class, 'read']);
        Route::get('/technitian/discard2/{id}', [techController::class, 'discard']);
        //  Route::view('technitian/distributetohospital', 'technitian.distributeToHospital');
        // Route::view('technitian/savedistribute', 'technitian.distributeBlood');
        Route::get('/technitian/filldiscard/{id}', [techController::class, 'filldiscard']);
        Route::post('/technitian/savedistribute', [techController::class, 'saveddistribute']);
        //Route::get('/technitian/notification', [HomeController::class, 'sendOfferNotification']);
        Route::get('/technitian/test', [techController::class, 'testBlood']);
        Route::get('/technitian/approve/{id}', [techController::class, 'approved']);
        Route::get('/technitian/discard/{id}', [techController::class, 'discards']);
        Route::get('/technitian/handling', [techController::class, 'handling']);
    });

    Route::middleware(['auth', 'user-role:healthinstitute'])->group(function () {
        Route::get('/healthinstitute/home', [HomeController::class, 'healthinstituteHome'])->name('healthinstitute.home');
        Route::get('/healthinstitute/home', [hospitalRequestController::class, 'viewblood'])->name('healthinstitute.home');

        Route::get('/healthinstitute/profile/{id}', [hospitalRequestController::class, 'Profile']);
        Route::post('/healthinstitute/updateprofile/{id}', [hospitalRequestController::class, 'updateProfile']);
        Route::post('/healthinstitute/updatephoto/{id}', [hospitalRequestController::class, 'updatephoto']);
        Route::post('/healthinstitute/changepassword', [hospitalRequestController::class, 'changepassword']);

        Route::view('/healthinstitute/seekerRegister', 'healthinstitute.postSeeker');
        Route::view('/healthinstitute/profile', 'healthinstitute.profile');
        Route::post('/healthinstitute/profile', [healthinstituteController::class, 'profile']);
        Route::post('/healthinstitute/seekerRegister', [bloodRequestController::class, 'bloodrequest']);
        Route::view('/healthinstitute/posts', 'healthinstitute.hospitalPost');
        Route::post('/healthinstitute/post_seeker', [hospitalRequestController::class, 'postSeeker']);
        Route::post('/healthinstitute/hospitalrequest', [hospitalRequestController::class, 'hospitalreq']);

        Route::view('/healthinstitute/hospitalrequest', 'healthinstitute.bloodRequestform');

        Route::get('/healthinstitute/request/{id}', [hospitalRequestController::class, 'viewrequest']);

        //  Route::view('/healthinstitute/finddonor', 'healthinstitute.findDonor');
        Route::post('/healthinstitute/search', [hospitalRequestController::class, 'search']);
        Route::get('/healthinstitute/finddonor', [hospitalRequestController::class, 'findDonor']);

        // Route::view('/healthinstitute/mypost', 'healthinstitute.mypost');
        Route::get('/healthinstitute/aa/{id}', [hospitalRequestController::class, 'mypost']);
        Route::delete('/healthinstitute/deletepost/{id}', [hospitalRequestController::class, 'deletepost']);
    });

    Route::middleware(['auth', 'user-role:bbmanager'])->group(function () {

        Route::get('/bbmanager/home', [HomeController::class, 'bbmanagerHome'])->name('bbmanager.home');
        Route::get('/bbmanager/home', [bbManagerController::class, 'HomePage'])->name('bbmanager.home');

        Route::view('/bbmanager/addhospital', 'bloodBankManager.addHospital');
        Route::post('/bbmanager/add_hospital', [bbManagerController::class, 'addHospital']);

        Route::get('/bbmanager/profile/{id}', [bbManagerController::class, 'Profile']);
        Route::post('/bbmanager/updateprofile/{id}', [bbManagerController::class, 'updateProfile']);
        Route::post('/bbmanager/updatephoto/{id}', [bbManagerController::class, 'updatephoto']);
        Route::post('/bbmanager/changepassword', [bbManagerController::class, 'changepassword']);

        Route::post('/bbmanager/reportcollection', [bbManagerController::class, 'ReportCollection']);
        Route::post('/bbmanager/reportdistribute', [bbManagerController::class, 'ReportDistribute']);
        Route::post('/bbmanager/reportrequest', [bbManagerController::class, 'ReportRequest']);
        Route::post('/bbmanager/distribute_specificday', [bbManagerController::class, 'ReportDis_one']);

        Route::get('/bbmanager/generatereport', [bbManagerController::class, 'view']);
        Route::get('/bbmanager/donorhistory', [bbManagerController::class, 'DonorHistory']);
        Route::post('/bbmanager/searchdonor', [bbManagerController::class, 'searchDonor']);

        Route::post('/bbmanager/sendresult/{id}', [bbManagerController::class, 'sendResult']);
        // Route::view('/bbmanager/tes', 'bloodBankManager.pdf.report');
        // Route::get('/bbmanager/res', [bbManagerController::class, 'rest']);
        Route::view('/bbmanager/bbinfo', 'bloodBankManager.addInformation');

        Route::post('/bbmanager/addinfo', [bbManagerController::class, 'addInfo']);
        Route::get('/bbmanager/feedback', [bbManagerController::class, 'feedbacks']);
        Route::get('/bbmanager/deletefeedback/{id}', [bbManagerController::class, 'deleteFeedbacks']);

        Route::get('/bbmanager/request', [bbManagerController::class, 'requests']);
        Route::delete('/bbmanager/deleterequest/{id}', [bbManagerController::class, 'deleteRequest']);

        Route::get('/bbmanager/bloods', [bbManagerController::class, 'Bloods']);
        Route::post('/bbmanager/distribute/{id}', [bbManagerController::class, 'Distribute']);

        Route::get('/bbmanager/read/{id}', [bbManagerController::class, 'Read']);
        Route::get('/bbmanager/approve/{id}', [bbManagerController::class, 'Approve']);
        Route::get('/bbmanager/disapprove/{id}', [bbManagerController::class, 'DisApprove']);
    });
    Route::middleware(['auth', 'user-role:encoder'])->group(function () {

        Route::get('/encoder/home', [HomeController::class, 'encoderHome'])->name('encoder.home');
        Route::get('/encoder/home', [encoderController::class, 'viewblood'])->name('encoder.home');

        Route::get('/encoder/profile/{id}', [encoderController::class, 'Profile']);
        Route::post('/encoder/updateprofile/{id}', [encoderController::class, 'updateProfile']);
        Route::post('/encoder/updatephoto/{id}', [encoderController::class, 'updatephoto']);
        Route::post('/encoder/changepassword', [encoderController::class, 'changepassword']);

        // Route::view('/encoder/addbloods', 'encoder.addBlood');recordBloodDetail
        Route::get('/encoder/record', [encoderController::class, 'Record']);

        Route::get('/encoder/recordblood/{id}', [encoderController::class, 'recordBloods']);
        Route::post('/encoder/addbloods', [encoderController::class, 'addblood']);

        // Route::view('/encoder/addbloods', 'encoder.add');
        Route::view('/encoder/handling', 'encoder.handling');
    });
});//prevent back middllewire
