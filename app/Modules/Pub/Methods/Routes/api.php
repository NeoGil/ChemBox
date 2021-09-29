<?php

Route::group(['prefix' => 'methods', 'middleware' => []], function () {
    Route::get('/', 'Api\MethodsController@index')->name('api.methods.index');
    Route::post('/', 'Api\MethodsController@store')->name('api.methods.store');
    Route::get('/{method}', 'Api\MethodsController@show')->name('api.methods.read');
    Route::put('/{method}', 'Api\MethodsController@update')->name('api.methods.update');
    Route::delete('/{method}', 'Api\MethodsController@destroy')->name('api.methods.delete');
});