<?php
Route::get('index', function(){
    // xx
});
Route::get('index', 'IndexController@index')->prefix('swoft_index');
