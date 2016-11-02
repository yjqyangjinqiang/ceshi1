<?php

//Route::get('/about','MyController@index');
//添加展示
Route::any('index','TestController@index');
//总列表
Route::any('lists','TestController@lists');
//删除路由
Route::get('del','TestController@del');
//修改路由
Route::any('update','TestController@update');

