<?php

Route::group(['prefix' => 'materials', 'middleware' => []], function () {
    Route::get('/', 'MaterialController@index')->name('materials.index');
    Route::get('/create/{method}', 'MaterialController@create')->name('materials.create');
    Route::post('/', 'MaterialController@store')->name('materials.store');
    Route::get('/{material}', 'MaterialController@show')->name('materials.read');
    Route::get('/edit/{material}', 'MaterialController@edit')->name('materials.edit');
    Route::put('/{material}', 'MaterialController@update')->name('materials.update');
    Route::delete('/{material}', 'MaterialController@destroy')->name('materials.delete');
});
