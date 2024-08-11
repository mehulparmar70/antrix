<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\api\MediaApiController;

use App\Http\Controllers\api\SliderController;
use App\Http\Controllers\api\ItemPriorityController;
use App\Http\Controllers\api\StatusController;
use App\Http\Controllers\api\ApiCallController;


Route::post('/admin/send-contact',[ApiCallController::class, 'sendContact'])->name('send-contact');