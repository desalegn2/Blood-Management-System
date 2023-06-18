<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\hospitalRequestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\adminnotificationController;
use App\Http\Controllers\nurseController;
use App\Http\Controllers\techController;
use App\Http\Controllers\bbManagerController;
use App\Http\Controllers\botController;
use App\Http\Controllers\hospitalController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\donorController;
use Illuminate\Support\Facades\Auth;

Route::match(['get', 'post'], 'botman', [botController::class, 'handle']);

Route::view('create_account', 'createAccount');
Route::post('/create_acc', [donorController::class, 'createAccount'])->name('create_acc');

Route::get('create_account_r/{referral_code}', [donorController::class, 'createAccount_Reffered']);
Route::post('create_account_referred', [donorController::class, 'Account_Reffered']);

Route::view('about', 'aboutus');
Route::get('/', [donorController::class, 'landingPage']);

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes(['verify' => true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth', 'user-role:donor'])->group(function () {
        Route::get('/donor/home', [HomeController::class, 'donorHome'])->name('donor.home');
        Route::get('/donor/home', [donorController::class, 'Home'])->name('donor.home');
        Route::view('/donor/asks', 'donor.chatbot');
        Route::view('/donor/refer', 'donor.referring');
        Route::get('/donor/refer/{user_id}', [donorController::class, 'ReferrdedDonor']);
        //reservation
        Route::get('/donor/reservationform', [donorController::class, 'ReservationForm']);
        Route::post('/donor/reservation/', [donorController::class, 'reservation']);
        Route::get('/donor/reservationhistory/{id}', [donorController::class, 'reservationHistory']);
        //profile
        Route::get('/donor/profile/{id}', [donorController::class, 'Profile']);
        Route::post('/donor/updateprofile/{id}', [donorController::class, 'updateProfile']);
        Route::post('/donor/updatephoto/{id}', [donorController::class, 'updatephoto']);
        Route::post('/donor/changepassword', [donorController::class, 'changepassword']);

        Route::get('/donor/seeker', [donorController::class, 'viewSeeer']);

        Route::get('donor/news', [donorController::class, 'viewNews']);
        Route::get('donor/information', [donorController::class, 'viewInfo']);
        Route::get('donor/feedback', [donorController::class, 'feedbacks']);
        Route::post('/donor/givefeedbak', [donorController::class, 'givefeedbacks']);

        Route::view('donor/aboutus', 'donor.aboutus');
        Route::view('donor/blood', 'donor.bloodtype');
    });

    Route::middleware(['auth', 'user-role:admin'])->group(function () {
        Route::get('/admin/home', [HomeController::class, 'dashboard'])->name('admin.home');
        Route::get('/admin/home', [AdminController::class, 'bloodavailability'])->name('admin.home');

        Route::get('/admin/search_user', [AdminController::class, 'searchUser']);
        Route::get('/admin/alluser', [AdminController::class, 'getUser']);
        Route::patch('/admin/updateuser/{id}', [AdminController::class, 'updateTech']);
        Route::delete('/admin/deleteuser/{id}', [AdminController::class, 'deleteTech']);
        Route::post('/ admin.block/{id}', [AdminController::class, 'blocks']);

        Route::get('/admin/user', [AdminController::class, 'index']);
        Route::view('/admin/add', 'admin.addUser');
        Route::post('/admin/add', [AdminController::class, 'register']);

        //profile
        Route::get('/admin/profile/{id}', [AdminController::class, 'Profile']);
        Route::post('/admin/updateprofile/{id}', [AdminController::class, 'updateProfile']);
        Route::post('/admin/updatephoto/{id}', [AdminController::class, 'updatephoto']);
        Route::post('/admin/changepassword', [AdminController::class, 'changepassword']);
    });

    Route::middleware(['auth', 'user-role:nurse'])->group(function () {
        Route::get('/nurse/home', [HomeController::class, 'nurseHome'])->name('nurse.home');
        Route::get('/nurse/home', [nurseController::class, 'ReturntoHome'])->name('nurse.home');
        //profile
        Route::get('/nurse/profile', [nurseController::class, 'Profile']);
        Route::post('/nurse/updateprofile/{id}', [nurseController::class, 'updateProfile']);
        Route::post('/nurse/updatephoto/{id}', [nurseController::class, 'updatephoto']);
        Route::post('/nurse/changepassword', [nurseController::class, 'changepassword']);

        Route::view('/nurse/enroll', 'nurse.enrollDonor');
        Route::post('/nurse/enrolldonor', [nurseController::class, 'enrollDonor']);
        Route::get('/nurse/notify', [nurseController::class, 'notifys']);
        Route::get('/nurse/email/{id}', [nurseController::class, 'emailSend']);
        Route::get('/nurse/sms/{donor_id}', [nurseController::class, 'smsSend']);

        Route::view('/nurse/advertise', 'nurse.advertise');
        Route::post('/nurse/advertise', [nurseController::class, 'advertise']);

        Route::view('/nurse/reservation', 'nurse.reserationManagement');
        Route::get('/nurse/reservation', [nurseController::class, 'manageReservation']);
        Route::get('/nurse/reservationdetail/{id}', [nurseController::class, 'reservationDetail']);
        Route::get('/nurse/findreservation', [nurseController::class, 'findReservation']);

        Route::post('/nurse.reservationstatus/{id}', [nurseController::class, 'reservationstatus']);

        Route::delete('/nurse/deletereservation/{id}', [nurseController::class, 'deleteRes']);
        Route::get('/nurse/accept/{id}', [nurseController::class, 'accept']);
        Route::patch('/nurse.changereservation/{id}', [nurseController::class, 'changeReservation']);

        Route::get('/nurse/donorbybloodtype', [nurseController::class, 'search_donors']);
        Route::get('/nurse/donordetail/{id}', [nurseController::class, 'Donordetail']);

        Route::get('/nurse/datetonotify', [nurseController::class, 'DaystoNotify']);

        Route::get('/nurse/listofdonor', [nurseController::class, 'listofDonor']);
        Route::post('/nurse/search_donor', [nurseController::class, 'searchDonor']);
        Route::get('/nurse/registordon/{id}', [nurseController::class, 'getDonor']);
        Route::get('/nurse/reservationregister/{id}', [nurseController::class, 'getReservation']);
        //donor history and discard bloods
        Route::get('/nurse/display', [nurseController::class, 'donorHistory']);
        Route::get('/nurse/searchdonorhistory', [nurseController::class, 'searchDonorHistory']);
        Route::get('/nurse/labresult', [nurseController::class, 'labResult']);

        Route::get('/nurse/discard', [nurseController::class, 'discarededBlood']);
        Route::get('/nurse/discardDonor/{donor_id}', [nurseController::class, 'discardDonor']);
        Route::get('/nurse/discrdlabresult/{testId}', [nurseController::class, 'discardLabResult']);
    });
    Route::middleware(['auth', 'user-role:technitian'])->group(function () {

        Route::get('/technitian/home', [HomeController::class, 'technitanHome'])->name('technitian.home');
        Route::get('/technitian/home', [techController::class, 'viewblood'])->name('technitian.home');
        //profile
        Route::get('/technitian/profile', [techController::class, 'Profile']);
        Route::post('/technitian/updateprofile/{id}', [techController::class, 'updateProfile']);
        Route::post('/technitian/updatephoto/{id}', [techController::class, 'updatephoto']);
        Route::post('/technitian/changepassword', [techController::class, 'changepassword']);

        Route::get('/technitian/expiredblood', [techController::class, 'ExpiredBlood']);
        Route::view('/technitian/addbloods', 'technitian.addBlood');
        Route::post('/technitian/addbloods', [techController::class, 'addblood']);

        Route::get('/technitian/viewstoredblood', [techController::class, 'view']);
        Route::get('/technitian/filldiscard/{id}', [techController::class, 'filldiscard']);
        //test 
        Route::get('/technitian/test', [techController::class, 'testBlood']);
        Route::get('/technitian/testblood/{id}', [techController::class, 'testBloodDetail']);
        Route::get('/technitian/blooddetail', [techController::class, 'bloodDetail']);
        Route::post('/technitian/stock', [techController::class, 'storeStock'])->name('technitian.stock');
        Route::get('/technitian/expire/{id}', [techController::class, 'expired']);

        Route::get('/technitian/handling', [techController::class, 'handling']);
    });

    Route::middleware(['auth', 'user-role:healthinstitute'])->group(function () {
        Route::get('/healthinstitute/home', [HomeController::class, 'healthinstituteHome'])->name('healthinstitute.home');
        Route::get('/healthinstitute/home', [hospitalController::class, 'viewblood'])->name('healthinstitute.home');
        //profile
        Route::get('/healthinstitute/profile', [hospitalController::class, 'Profile']);
        Route::post('/healthinstitute/updateprofile/{id}', [hospitalController::class, 'updateProfile']);
        Route::post('/healthinstitute/updatephoto/{id}', [hospitalController::class, 'updatephoto']);
        Route::post('/healthinstitute/changepassword', [hospitalController::class, 'changepassword']);

        Route::view('/healthinstitute/hospitalrequest', 'healthinstitute.bloodRequestform');
        Route::post('/healthinstitute/bloodrequest', [hospitalController::class, 'bloodRequest']);
        Route::get('/healthinstitute/history/{id}', [hospitalController::class, 'viewHistory']);
        Route::post('/healthinstitute/accept/{id}', [hospitalController::class, 'Accept']);

        Route::post('/healthinstitute/search', [hospitalController::class, 'search']);
        Route::get('/healthinstitute/finddonor', [hospitalController::class, 'findDonor']);
        //post seeker
        Route::view('/healthinstitute/posts', 'healthinstitute.hospitalPost');
        Route::post('/healthinstitute/post_seeker', [hospitalController::class, 'postSeeker']);
        Route::get('/healthinstitute/mypost/{id}', [hospitalController::class, 'myPost']);
        Route::delete('/healthinstitute/deletepost/{id}', [hospitalController::class, 'deletepost']);

        Route::view('/healthinstitute/adddoctor', 'healthinstitute.addDoctor');
        Route::post('/healthinstitute/add_doctor', [hospitalController::class, 'addDoctors']);

        Route::get('/healthinstitute/bloods', [hospitalController::class, 'bloodStore']);
        Route::get('/healthinstitute/expire/{id}', [hospitalController::class, 'discaredExpiredBlood']);
        Route::get('/healthinstitute/expiredblood', [hospitalController::class, 'fetchExpiredBlood']);
        
    });

    Route::middleware(['auth', 'user-role:bbmanager'])->group(function () {

        Route::get('/bbmanager/home', [HomeController::class, 'bbmanagerHome'])->name('bbmanager.home');
        Route::get('/bbmanager/home', [bbManagerController::class, 'HomePage'])->name('bbmanager.home');

        Route::view('/bbmanager/addhospital', 'bloodBankManager.addHospital');
        Route::post('/bbmanager/add_hospital', [bbManagerController::class, 'addHospital']);
        //profile
        Route::get('/bbmanager/profile/{id}', [bbManagerController::class, 'Profile']);
        Route::post('/bbmanager/updateprofile/{id}', [bbManagerController::class, 'updateProfile']);
        Route::post('/bbmanager/updatephoto/{id}', [bbManagerController::class, 'updatephoto']);
        Route::post('/bbmanager/changepassword', [bbManagerController::class, 'changepassword']);
        //report
        Route::get('/bbmanager/report', [bbManagerController::class, 'ReturnReportpage']);
        Route::get('/bbmanager/generatereport', [bbManagerController::class, 'view']);
        Route::post('/bbmanager/morethanOneDayCollection', [bbManagerController::class, 'ReportCollection']);
        Route::post('/bbmanager/onedayCollection', [bbManagerController::class, 'oneDayCollection']);
        Route::post('/bbmanager/manydayDistributeReport', [bbManagerController::class, 'manyDayReportDistribute']);
        Route::post('/bbmanager/distribute_specificday', [bbManagerController::class, 'ReportDis_one']);
        Route::post('/bbmanager/reportrequest', [bbManagerController::class, 'ReportRequest']);
        Route::post('/bbmanager/onedayRequest', [bbManagerController::class, 'oneDayRequest']);


        Route::get('/bbmanager/donorhistory', [bbManagerController::class, 'DonorHistory']);
        Route::post('/bbmanager/searchdonor', [bbManagerController::class, 'searchDonor']);
        Route::post('/bbmanager/sendresult/{id}', [bbManagerController::class, 'sendResult']);
        Route::get('/bbmanager/bloodjorny', [bbManagerController::class, 'bloodJorny']);
        Route::post('/bbmanager/sendbloodjorny/{id}', [bbManagerController::class, 'sendBloodJorny']);

        Route::view('/bbmanager/bbinfo', 'bloodBankManager.addInformation');
        Route::post('/bbmanager/addinfo', [bbManagerController::class, 'addInfo']);
        Route::post('/bbmanager/addCentor', [bbManagerController::class, 'addCenters']);
        Route::get('/bbmanager/feedback', [bbManagerController::class, 'feedbacks']);
        Route::get('/bbmanager/deletefeedback/{id}', [bbManagerController::class, 'deleteFeedbacks']);

        Route::get('/bbmanager/request', [bbManagerController::class, 'requests']);
        Route::delete('/bbmanager/deleterequest/{id}', [bbManagerController::class, 'deleteRequest']);
        Route::post('/bbmanager/approverequest/{id}', [bbManagerController::class, 'Approve']);

        Route::get('/bbmanager/bloods', [bbManagerController::class, 'Bloods']);
        Route::post('/bbmanager/distribute/{id}', [bbManagerController::class, 'Distribute']);
        Route::get('/bbmanager/choosebloodtype', [bbManagerController::class, 'selectBlood']);


        // Route::get('/bbmanager/read/{id}', [bbManagerController::class, 'Read']);
        //  Route::get('/bbmanager/approve/{id}', [bbManagerController::class, 'Approve']);
        //  Route::get('/bbmanager/disapprove/{id}', [bbManagerController::class, 'DisApprove']);

        Route::get('/bbmanager/referral', [bbManagerController::class, 'Referral']);
    });

    Route::middleware(['auth', 'user-role:doctor'])->group(function () {

        Route::get('/doctor/home', [HomeController::class, 'doctorHome'])->name('doctor.home');
        Route::get('/doctor/home', [doctorController::class, 'viewblood'])->name('doctor.home');

        //profile
        Route::get('/doctor/profile', [doctorController::class, 'Profile']);
        Route::post('/doctor/updateprofile/{id}', [doctorController::class, 'updateProfile']);
        Route::post('/doctor/updatephoto/{id}', [doctorController::class, 'updatephoto']);
        Route::post('/doctor/changepassword', [doctorController::class, 'changepassword']);

        Route::get('/doctor/transfer', [doctorController::class, 'BloodTransfer']);
        Route::post('/doctor/transfusion/{id}', [doctorController::class, 'Transfusion']);
        Route::view('/doctor/finddonor', 'doctor.searchDonor');

        // Route::post('/healthinstitute/search', [hospitalController::class, 'search']);
        Route::post('/doctor/search', [doctorController::class, 'search']);
    });
});//prevent back middllewire
