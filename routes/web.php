<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenitureController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParametersController;
use App\Http\Controllers\ParametersControllers;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\SamplesControllers;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\RenveueController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authentication;
use App\Http\Middleware\NotNurseMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;




Route::middleware(Authentication::class)->group(function(){

    Route::controller(HomeController::class)->group(function(){
        Route::get('/','index')->name('home');
    });
    Route::controller(TestController::class)->prefix('/tests')->middleware(NotNurseMiddleware::class)->group(function(){
        Route::get('/','index')->name('tests');
        Route::post('/','store')->name('store_test');
        Route::get('/add','create')->name('create_test');
        Route::get('/{id}/edit', 'edit')->name('edit_test');
        Route::put('/{id}','update')->name('update_test');
        Route::delete('/{id}','destroy')->name('delete_test');
        Route::get('/print', 'print')->name('print_test');
    });


    Route::controller(ParametersController::class)->prefix('/parameters')->middleware(NotNurseMiddleware::class)->group(function(){
        Route::get('/', 'index')->name('parameters');
        Route::post('/','store')->name('store_parameter');
        Route::get('/add','create')->name('create_parameter');
        Route::get('/{id}/edit', 'edit')->name('edit_parameter');
        Route::put('/{id}','update')->name('update_parameter');
        Route::delete('/{id}','destroy')->name('delete_parameter');
        Route::get('/print', 'print')->name('print_parameter');


    });

    Route::controller(GroupController::class)->prefix('/groups')->middleware(NotNurseMiddleware::class)->group(function(){
        Route::get('/', 'index')->name('groups');
        Route::post('/','store')->name('store_group');
        Route::get('/add','create')->name('create_group');
        Route::get('/{id}/edit', 'edit')->name('edit_group');
        Route::put('/{id}','update')->name('update_group');
        Route::delete('/{id}','destroy')->name('delete_group');
        Route::get('/print', 'print')->name('print_group');


    });


    Route::controller(PatientsController::class)->prefix('/patients')->group(function(){
        Route::get('/', 'index')->name('patients');
        Route::post('/','store')->name('store_patient');
        Route::get('/add','create')->name('create_patient');
        Route::get('/{id}/edit', 'edit')->name('edit_patient');
        Route::put('/{id}','update')->name('update_patient');
        Route::delete('/{id}','destroy')->name('delete_patient');
        Route::get('/print', 'print')->name('print_patient');
    });


    Route::controller(VisitsController::class)->prefix('/visits')->group(function(){
        Route::get('/', 'index')->name('visits');
        Route::post('/','store')->name('store_visit');
        Route::get('/add','create')->name('create_visit');
        Route::delete('/{id}','destroy')->name('delete_visit');
        Route::get('/print', 'print')->name('print_visit');
        Route::get('/{id}/result','createVisitResult')->name('visitResultPage');
        Route::post('/{id}/result','setResult')->name('set_visit_result');
        Route::get('/{id}/result/print','printResult')->name('visit_print_result');
    });

    Route::controller(SamplesControllers::class)->prefix('/samples')->group(function(){
        Route::get('/', 'index')->name('samples');
        Route::post('/{id}/update-status','updateStatus')->name('update_status_sample');
        Route::get('/print','print')->name('print_samples');
    });


    Route::controller(ExpenitureController::class)->prefix('expenditure')->group(function(){
        Route::get('/','index')->name('expends');
        Route::post('/','store')->name('store_expends');
        Route::get('/add','create')->name('create_expend');
        Route::delete('/{id}','destroy')->name('delete_expend');
        Route::get('/print', 'print')->name('print_expends');
    });

    Route::controller(RenveueController::class)->prefix('revenue')->group(function(){
        Route::get('/','index')->name('revenues');
        Route::post('/','store')->name('store_revenue');
        Route::get('/add','create')->name('create_revenue');
        Route::delete('/{id}','destroy')->name('delete_revenue');
        Route::get('/print', 'print')->name('print_revenues');
        Route::post('/{id}/change-status', 'updateStatus')->name('change_revenue_status');
    });

    Route::controller(MaterialsController::class)->prefix('/materials')->group(function(){
        Route::get('/', 'index')->name('materials');
        Route::post('/','store')->name('store_material');
        Route::get('/add','create')->name('create_material');
        Route::get('/{id}/edit', 'edit')->name('edit_material');
        Route::put('/{id}','update')->name('update_material');
        Route::delete('/{id}','destroy')->name('delete_material');
        Route::get('/print', 'print')->name('print_material');
    });

    Route::controller(UsersController::class)->prefix('/users')->middleware(AdminMiddleware::class)->group(function(){
        Route::get('/', 'index')->name('users');
        Route::post('/','store')->name('store_user');
        Route::get('/add','create')->name('create_user');
        Route::get('/{id}/edit', 'edit')->name('edit_user');
        Route::put('/{id}','update')->name('update_user');
        Route::delete('/{id}','destroy')->name('delete_user');
        Route::get('/print', 'print')->name('print_user');
    });

});



Route::controller(AuthController::class)->middleware('guest')->group(function(){
    Route::get('/login','SinIn')->name('sinIn');
    Route::post('/login','login')->name('login');
});

Route::controller(AuthController::class)->middleware('auth')->group(function(){
    Route::post('/logout','logout')->name('logout');
});

