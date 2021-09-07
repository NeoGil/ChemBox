<?php

Route::group(['prefix' => 'courses', 'middleware' => []], function () {
    Route::get('/', 'CourseController@index')->name('courses.index');
    Route::get('/create', 'CourseController@create')->name('courses.create');
    Route::post('/', 'CourseController@store')->name('courses.store');
    Route::get('/{course}', 'CourseController@show')->name('courses.read');
    Route::get('/edit/{course}', 'CourseController@edit')->name('courses.edit');
    Route::put('/{course}', 'CourseController@update')->name('courses.update');
    Route::delete('/{course}', 'CourseController@destroy')->name('courses.delete');
});