<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// ACTIONS
Route::get('/actions', 'ActionController@GetActions');

Route::get('/actions/{id?}', 'ActionController@GetAction');

Route::post('/actions', 'ActionController@PostAction');

Route::patch('/actions/{id?}', 'ActionController@PatchAction');

Route::delete('/actions/{id?}', 'ActionController@DeleteAction');
// HISTORIES
Route::get('/histories', 'HistoryController@GetHistories');

Route::get('/histories/{id?}', 'HistoryController@GetHistory');

Route::post('/histories', 'HistoryController@PostHistory');

Route::patch('/histories/{id?}', 'HistoryController@PatchHistory');

Route::delete('/histories/{id?}', 'HistoryController@DeleteHistory');
// REPORTS
Route::get('/reports', 'ReportController@GetReports');

Route::get('/reports/{id?}', 'ReportController@GetReport');

Route::post('/reports', 'ReportController@PostReport');

Route::patch('/reports/{id?}', 'ReportController@PatchReport');

Route::delete('/reports/{id?}', 'ReportController@DeleteReport');
// SERVICES
Route::get('/services', 'ServiceController@GetServices');

Route::get('/services/{id?}', 'ServiceController@GetService');

Route::post('/services', 'ServiceController@PostService');

Route::patch('/services/{id?}', 'ServiceController@PatchService');

Route::delete('/services/{id?}', 'ServiceController@DeleteService');
// TICKETS
Route::get('/tickets', 'TicketController@GetTickets');

Route::get('/tickets/{id?}', 'TicketController@GetTicket');

Route::post('/tickets', 'TicketController@PostTicket');

Route::patch('/tickets/{id?}', 'TicketController@PatchTicket');

Route::delete('/tickets/{id?}', 'TicketController@DeleteTicket');