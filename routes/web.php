<?php

/**
 * PHP Version 7.4.25
 * Laravel Framework 8.83.18
 *
 * @category Web
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 28/08/22
 * */

use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobStatusController;
use App\Http\Controllers\Admin\TimeFrameController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\User\DriverController;
use App\Http\Controllers\Customer\AddressBookController as CustomerAddressBookController;
use App\Http\Controllers\Customer\JobController as CustomerJobController;
use App\Http\Controllers\Driver\JobController as DriverJobController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['verify' => true, 'register' => false]);

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('job.index');
        } elseif (Auth::user()->isCustomer()) {
            return redirect()->route('jobs.index');
        } elseif (Auth::user()->isDriver()) {
            return redirect()->route('myjob.index');
        } else {
            return redirect('login');
        }
    }

    return redirect('login');
});

Route::group(['middleware' => ['auth', 'is-active']], function () {
//    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/list_customer', [CustomerController::class, 'getCustomers'])->name('customer.list');
    Route::get('/list_driver', [DriverController::class, 'getDrivers'])->name('driver.list');
    Route::get('/list_area', [AreaController::class, 'getAreas'])->name('area.list');
    Route::get('/list_timeframe', [TimeFrameController::class, 'getTimeframe'])->name('timeframe.list');

    /*Admin Routes */
    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'name' => 'admin'.'.'], function () {
        Route::resource('/user/customer', CustomerController::class);
        Route::resource('/user/driver', DriverController::class);
        Route::resource('/area', AreaController::class);
        Route::get('/job/completed', [JobController::class, 'completed'])->name('job.completed');
        Route::get('/job/completed/{job}/view', [JobController::class, 'view'])->name('job.completed.view');
        Route::post('/job/getAddress', [JobController::class, 'getAddress'])->name('job.getAddress');
        Route::post('/job/getAddressBook', [JobController::class, 'getAddressBook'])->name('job.getAddressBook');
        Route::post('/job/assignDriver', [JobController::class, 'assignDriver'])->name('job.assignDriver');
        Route::post('/job/getCustomerContact', [JobController::class,
            'getCustomerContact'])->name('job.getCustomerContact');
        Route::post('/job/updateHistory', [JobController::class, 'updateHistory'])->name('job.updateHistory');
        Route::post('/job/deleteHistory', [JobController::class, 'deleteHistory'])->name('job.deleteHistory');
        Route::resource('/job', JobController::class);
        Route::resource('/job/edit_address_book', CustomerAddressBookController::class)->only(['edit', 'update']);
        Route::resource('/job/status/job_status', JobStatusController::class)->name('*', 'job_status');
    });

    /*Customer Routes */
    Route::group(['middleware' => 'customer', 'prefix' => 'customer', 'name' => 'customer'.'.'], function () {
        Route::post('/jobs/getAddress', [CustomerJobController::class, 'getAddress'])->name('jobs.getAddress');
        Route::post('/jobs/getAddressBook', [CustomerJobController::class, 'getAddressBook'])->name('jobs.getAddressBook');
        Route::post('/jobs/getCustomerContact', [CustomerJobController::class,
            'getCustomerContact'])->name('jobs.getCustomerContact');
        Route::get('/jobs/completed', [CustomerJobController::class, 'completed'])->name('jobs.completed');
        Route::get('/jobs/completed/{job}/view', [CustomerJobController::class, 'view'])->name('jobs.completed.view');
        Route::resource('/jobs', CustomerJobController::class)->except('show');
        Route::resource('jobs/address_book', CustomerAddressBookController::class);
    });

    /*Driver Routes */
    Route::group(['middleware' => 'driver', 'prefix' => 'driver', 'name' => 'driver'.'.'], function () {
        Route::post('/myjob/updateHistory', [DriverJobController::class, 'updateHistory'])->name('myjob.updateHistory');
        Route::post('/myjob/deleteHistory', [DriverJobController::class, 'deleteHistory'])->name('myjob.deleteHistory');
        Route::resource('/myjob', DriverJobController::class)->except(['create', 'edit', 'destroy']);
    });
});
