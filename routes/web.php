<?php

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



//admin reservations
Route::post('/administration/reservations/search','ReservationController@adminsearchResrvations');
Route::get('/administration/reservations/{operation}/{id_reservation}','ReservationController@adminConfAnnulResrvation');
Route::get('/administration/reservations/ajouter',function(){return view('adminAddReservation');});
Route::get('/administration/reservations','ReservationController@adminconsulterResrvations')->middleware('auth:admin');
Route::post('/ajaxadminfetchdata','ReservationController@AjaxfetchDatatoAddRes');
Route::post('/administration/reservations/AddReservation','ReservationController@AdminAddReservation');

//admin salons
Route::get('/administration/salons/ajouter',function(){return view('adminAjoutSalon');});
Route::post('/administration/AjouterSalon','salonController@adminAjoutSalon');
Route::get('/administration/salons','salonController@adminconsultersalons');
Route::get('/administration/salons/view/{id_salon}','salonController@adminviewsalon');
Route::get('/administration/salons/Modifier/{id_salon}','salonController@adminmodifiersalon');
Route::post('administration/modifierSalon','salonController@modifiersalon');
Route::post('/administration/salons/search','salonController@Adminsearchsalon');
//admin coiffeurs
Route::get('/administration/coiffeurs','CoiffeurController@adminconsultercoiffeurs');
Route::get('/administration/coiffeurs/ajouter',function(){return view('adminAjoutCoiffeur');});
Route::post('/administration/AjouterCoiffeur','CoiffeurController@adminAjoutCoiffeur');
Route::get('/administration/coiffeurs/view/{id_coiffeur}','CoiffeurController@adminviewcoiffeur');
Route::get('/administration/coiffeurs/Modifier/{id_coiffeur}','CoiffeurController@adminmodifiercoiffeur');
Route::post('/administration/ModifierCoiffeur','CoiffeurController@modifiercoiffeur');
Route::post('/administration/coiffeurs/search','CoiffeurController@adminsearchcoiffeur');

//admin prestations 
Route::get('/administration/prestations','PristationController@adminconsultprestations');
Route::get('/administration/prestation/ajouter',function(){return view('adminAjoutPrestation');});
Route::post('/administration/AjouterPrestation','PristationController@adminAjoutPrestation');
Route::get('/administration/prestations/view/{id_prestation}','PristationController@adminviewprestation');
Route::get('/administration/prestations/Modifier/{id_prestation}','PristationController@adminModifierprestation');
Route::post('/administration/ModifierPrestation','PristationController@modifierPrestation');
Route::post('/administration/prestations/search','PristationController@adminsearchprestation');
//admin statistiques
Route::get('/administration/Statistiques','ReservationController@adminConsultstatistiques');
Route::get('/test',function(){return view('testpage');});
//Admin_Auth
Route::get('/admin', function(){return view('adminLogin');})->name('admin.login');
Route::post('/adminLogin', 'adminController@adminLogin');
Route::get('/adminLogout', 'adminController@adminLogout');
Route::get('/administration','CoiffeurController@adminconsulterResrvations')->middleware('auth:admin');
Route::get('/administration/{day}','CoiffeurController@adminconsulterResrvationsByDAY')->middleware('auth:admin');


Route::get('/logout','ClientController@logout');
Route::post('/login', 'ClientController@login');
Route::post('/singup', 'ClientController@singup');
Route::post('/search','ClientController@search');

Route::get('/singup/verification/{code_verification_recevoire}'
,'ClientController@emailVerification');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/singup', function () {
    return view('singup');
});
Route::get('/Annuler_reservation/{ID_RESERVATION}','ReservationController@annuler_reservation');
Route::get('/client/{id_reservations}','ReservationController@inforeservations');
Route::get('/client/reservations/{statu}','ReservationController@Showreservations');
Route::get('/{NAME_SALON}/{NAME_COIFFEUR}/{ID_PRESTATION}/{reservation_date}/{reservation_time}','ReservationController@addreservation'); 



Route::get('/{NAME_SALON}/{NAME_COIFFEUR}/{ID_PRESTATION}', 
'ReservationController@creatreservation');

Route::get('/', 'SalonController@showsalons');
Route::get('/{NAME_SALON}','CoiffeurController@showcoiffeurs')->middleware('auth');
Route::get('/{NAME_SALON}/{NAME_COIFFEUR}', 'PristationController@showprestations');








