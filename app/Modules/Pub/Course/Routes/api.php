<?php

Route::group(['prefix' => 'courses', 'middleware' => []], function () {
    Route::get('/', 'Api\CourseController@index')->name('api.courses.index');
    Route::get('/nlink/{url}', 'Api\CourseController@nav_link')->name('api.courses.nav_link');
    Route::post('/', 'Api\CourseController@store')->name('api.courses.store');
    Route::get('/{alias}', 'Api\CourseController@show')->name('api.courses.read');
    Route::put('/{course}', 'Api\CourseController@update')->name('api.courses.update');
    Route::delete('/{course}', 'Api\CourseController@destroy')->name('api.courses.delete');
});
