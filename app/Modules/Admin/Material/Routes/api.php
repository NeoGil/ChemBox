<?php

Route::group(['prefix' => 'materials', 'middleware' => []], function () {
    Route::get('/', 'Api\MaterialController@index')->name('api.materials.index');
    Route::post('/', 'Api\MaterialController@store')->name('api.materials.store');
    Route::get('/{material}', 'Api\MaterialController@show')->name('api.materials.read');
    Route::put('/{material}', 'Api\MaterialController@update')->name('api.materials.update');
    Route::delete('/{material}', 'Api\MaterialController@destroy')->name('api.materials.delete');
});