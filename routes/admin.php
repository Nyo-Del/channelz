<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminrvController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\UserrvController;
use App\Models\userrv;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;


  Route::group(['middleware' => 'admin'],function(){
        //back to adminhome
        Route::get('/back',[AdminController::class,'back'])->name('back');

        //view admin acc
        Route::group(['prefix' => 'admin'],function(){
            Route::get('/profile',[AdminController::class,'profile'])->name('pf');
            Route::post('profile/{id}',[ProfileController::class,'editpf'])->name('edit');

            //view adding new acc
            Route::get('/addnew',[AdminController::class,'addnew'])->name('newadm');
            Route::post('addnew/',[AdminController::class,'new'])->name('addnew');

            //view mv upload
            Route::get('/upload',[AdminController::class,'upload'])->name('upload');
            Route::post('addnew/{id}',[MovieController::class,'Mvnew'])->name('mvnew');
            Route::get('Mvdelete/{id}',[MovieController::class,'delete'])->name('Mv#delete');

            //view category create
            Route::get('/Create',[AdminController::class,'create'])->name('C#create');
            Route::post('categories/',[CategoryController::class,'create'])->name('create');
            Route::get('Cdelete/{id}',[CategoryController::class,'delete'])->name('c#delete');

            // view password change
            Route::get('/ChangeP',[AdminController::class,'change'])->name('change#p');
            Route::post('changepassword/',[ProfileController::class,'changepassword'])->name('changepassword#');

            //view ads
            Route::get('/ads',[AdminController::class,'ads'])->name('V#ads');
            Route::post('ads/',[AdController::class,'adcreate'])->name('adcreate');
            Route::post('adsaction/{id}',[AdController::class,'action'])->name('adaction');

            //view admin mv details
            Route::get('edits/{id}',[AdminController::class,'edit'])->name('edit#mv');
            Route::post('Editmv/{id}',[MovieController::class,'editmv'])->name('editmv');

            //view admin web
            Route::get('web/',[AdminController::class,'webdash'])->name('web');

            //view admin list
            Route::get('adminlist/{id?}',[AdminController::class,'list'])->name('adminlist');

            //Ban Admin
            Route::get('Ban/{id}',[AdminController::class,'ban'])->name('ban');

            //delete admin rv
            Route::post('Adminrv/{id}',[AdminrvController::class,'adminrv'])->name('adminrv');
            Route::get('admindelete/{id}',[AdminrvController::class,'delete'])->name('admdelete');

            //view ad list
            Route::get('adlist/{id?}',[AdController::class,'list'])->name('adlist');

            //delete ads
            Route::get('addelete/{id}',[AdController::class,'delete'])->name('addelete');

            //activity
            Route::get('active/{id}',[StatuController::class,'active'])->name('active');
            //delete user rv
            Route::get('userrvdelete/{id}',[UserrvController::class,'delete'])->name('delete');
        });

});

   //user section
    Route::group(['prefix' => 'user'],function(){

        Route::post('Userrv/',[UserrvController::class,'userrv'])->name('userrv');

       //view user mv details
        Route::get('details/{id}',[AdminController::class,'details'])->name('details');
     });













