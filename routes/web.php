<?php


Route::get('/SendContact', 'MixedDataController@SendContact');
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'Admin'], 'prefix' => 'admin'], function () {
   Route::get('/','AdminController@index')->name('ok');
});



Route::group(['middleware' => ['auth', 'User'], 'prefix' => '/'], function () {

Route::get('/', 'HomeController@index')->name('home')->middleware('verified');

// Ajax Get Region
Route::post('/getregion', 'RegionController@GetCountryID');

Route::get('/ownpage', 'HomeController@OwnPage')->name('ownpage');

Route::get('/pradam', 'PradamController@index')->name('pradam');
Route::get('/pradam_finel_product/{id}', 'PradamController@FinelProduct')->name('pradam finel product');
Route::get('/pradam_ownpage/{id}', 'PradamController@OwnPage')->name('pradam ownpage');
Route::get('/add_pradam', 'PradamController@AddPradam')->name('add pradam');
Route::get('/edit_pradam', 'PradamController@EditPradam')->name('edit pradam');
Route::post('/send_message', 'PradamController@SendMessages')->name('send message');

Route::get('/PradamKabinet/', 'PradamController@Kabinet')->name('pradam kabinet');

Route::get('/kuplyu', 'KuplyuController@index')->name('kuplyu');
Route::get('/kuplyu_finel_product/{id}', 'KuplyuController@FinelProduct')->name('kuplyu finel product');
Route::get('/kuplyu_ownpage/{id}', 'KuplyuController@OwnPage')->name('kuplyu ownpage');
Route::get('/add_kuplyu', 'KuplyuController@AddKuplyu')->name('add kuplyu');
Route::match(['get', 'post'],'/EditKuplyu/{id}', 'KuplyuController@EditKuplyu')->name('edit kuplyu');
Route::post('/sendMessageKuplyu', 'KuplyuController@SendMessages')->name('send message kuplyu');
Route::post('/DeleteImgKuplyu','KuplyuController@DeleteImg');

Route::get('/KuplyuKabinet', 'KuplyuController@Kabinet')->name('kuplyu kabinet');

Route::get('/tenorders', 'TenOrdersController@index')->name('tenorders');
Route::get('/tenorders_finel_product/{id}', 'TenOrdersController@FinelProduct')->name('tenorders finel product');
Route::get('/tenorders_ownpage/{id}', 'TenOrdersController@OwnPage')->name('tenorders ownpage');
Route::get('/add_tenorders', 'TenOrdersController@AddTenOrders')->name('add tenorders');
Route::get('/edit_tenorders', 'TenOrdersController@EditTenOrders')->name('edit tenorders');
Route::post('/sendMessageTenOrders', 'TenOrdersController@SendMessages')->name('send message ten orders');

Route::get('/TenordersKabinet', 'TenOrdersController@Kabinet')->name('tenorders kabinet');

Route::get('/arganizacya', 'ArganizacyaController@index')->name('arganizacya');
Route::get('/arganizacya_finel_product/{id}', 'ArganizacyaController@FinelProduct')->name('arganizacya finel product');
Route::get('/add_arganizacya', 'ArganizacyaController@AddArganizacya')->name('add arganizacya');
Route::match(['get', 'post'],'/EditArganizacya/{id}', 'ArganizacyaController@EditArganizacya')->name('edit arganizacya');
Route::post('/DeleteImgArganizacya','ArganizacyaController@DeleteImg');

Route::get('/ArganizacyaKabinet', 'ArganizacyaController@Kabinet')->name('arganizacya kabinet');

Route::match(['get', 'post'],'/contact', 'MixedDataController@Contact')->name('contact');


Route::get('/privacypolicy', 'MixedDataController@PrivacyPolicy')->name('privacypolicy');

Route::get('/reklama', 'MixedDataController@Reklama')->name('reklama');

Route::get('/incoming', 'MessagesController@Incoming')->name('incoming');
Route::match(['get', 'post'],'/IncomingReplyPradam/{id}/{message_user_id}', 'MessagesController@IncomingReplyPradam')->name('incoming reply pradam');
Route::match(['get', 'post'],'/incomingReplykuplyu/{id}/{message_user_id}', 'MessagesController@IncomingReplyKuplyu')->name('incoming reply kuplyu');
Route::match(['get', 'post'],'/incomingReplyTenOrders/{id}/{message_user_id}', 'MessagesController@IncomingReplyTenOrders')->name('incoming reply ten orders');


Route::post('IncomingReplyMessagePradam', 'MessagesController@IncomingReplyMessagePradam')->name('incoming reply message pradam');
Route::post('IncomingReplyMessageKuplyu', 'MessagesController@IncomingReplyMessageKuplyu')->name('incoming reply message kuplyu');
Route::post('IncomingReplyMessageTenOrders', 'MessagesController@IncomingReplyMessageTenOrders')->name('incoming reply message ten orders');

// Delete Messages
Route::get('DeleteMessageTenOrders/{message_user_id}/{url}/{product_id}', 'MessagesController@DeleteMessageTenOrders')->name('delete message ten orders');
Route::get('DeleteMessageKuplyu/{message_user_id}/{url}/{product_id}', 'MessagesController@DeleteMessageKuplyu')->name('delete message kuplyu');
Route::get('DeleteMessageParadam/{message_user_id}/{url}/{product_id}', 'MessagesController@DeleteMessageParadam')->name('delete message pradam');
Route::get('DeleteMessageRequest/{message_user_id}/{url}', 'MessagesController@DeleteMessageRequest')->name('delete message request');

Route::get('/send', 'MessagesController@Send')->name('send');
Route::match(['get', 'post'],'sendReplyPradam/{id}/{message_user_id}', 'MessagesController@SendReplyPradam')->name('send reply pradam');
Route::match(['get', 'post'],'sendReplyKuplyu/{id}/{message_user_id}', 'MessagesController@SendReplyKuplyu')->name('send reply kuplyu');
Route::match(['get', 'post'],'sendReplyTenOrders/{id}/{message_user_id}', 'MessagesController@SendReplyTenOrders')->name('send reply ten orders');

Route::post('SendReplyMessagePradam', 'MessagesController@SendReplyMessagePradam')->name('send reply message pradam');
Route::post('SendReplyMessageKuplyu', 'MessagesController@SendReplyMessageKuplyu')->name('send reply message kuplyu');
Route::post('SendReplyMessageTenOrders', 'MessagesController@SendReplyMessageTenOrders')->name('send reply message ten orders');

Route::post('SendRequestMessage', 'PradamController@SendRequestMessages')->name('send message request');
Route::match(['get', 'post'],'IncomingReplyRequest/{message_user_id}', 'MessagesController@IncomingReplyRequest')->name('incoming reply request');
Route::match(['get', 'post'],'SendReplyRequest/{message_user_id}', 'MessagesController@SendReplyRequest')->name('send reply request');
Route::post('IncomingReplyMessageRequest', 'MessagesController@IncomingReplyMessageRequest')->name('incoming reply message request');
Route::post('SendReplyMessageRequest', 'MessagesController@SendReplyMessageRequest')->name('send reply message request');


Route::match(['get', 'post'],'/profile', 'UserSettingsController@Profile')->name('profile');
Route::match(['get', 'post'],'/edit_delete_contact_information', 'UserSettingsController@EditDeleteContactInformation')->name('edit contact information');
Route::post('/account_check_password', 'UserSettingsController@AccountCheckPassword')->name('account check password');
Route::post('/account_reset_password', 'UserSettingsController@AccountResetPassword')->name('account reset password');
Route::post('/account_edit_email', 'UserSettingsController@AccountEditEmail')->name('account edit email');
Route::post('/account_delete', 'UserSettingsController@AccountDelete')->name('account delete');
Route::post('/edit_profile', 'UserSettingsController@EditProfile')->name('edit profile');
Route::get('/fizicheskoye', 'UserSettingsController@Fizicheskoye')->name('fizicheskoye');
Route::post('/fizicheskoye_edit', 'UserSettingsController@FizicheskoyeEdit')->name('fizicheskoye edit');
Route::post('/yuridicheskoye_edit', 'UserSettingsController@YuridicheskoyeEdit')->name('yuridicheskoye edit');
Route::get('/yuridicheskoye', 'UserSettingsController@Yuridicheskoye')->name('yuridicheskoye');



Route::post('BlockUser','MessagesController@BlockUser')->name('block user');
Route::post('RazBlockUser','MessagesController@RazblockUser')->name('razblock user');
Route::post('Raz_Block_User','UserSettingsController@RazblockUser');

Route::get('/test', 'HomeController@OwnPage');
   });
