<?php

Route::group(['prefix' => 'methods', 'middleware' => []], function () {
    Route::get('/', 'MethodsController@index')->name('methods.index');
    Route::get('/create', 'MethodsController@create')->name('methods.create');
    Route::post('/', 'MethodsController@store')->name('methods.store');
    Route::get('/{method}', 'MethodsController@show')->name('methods.read');
    Route::get('/edit/{method}', 'MethodsController@edit')->name('methods.edit');
    Route::put('/{method}', 'MethodsController@update')->name('methods.update');
    Route::delete('/{method}', 'MethodsController@destroy')->name('methods.delete');
});