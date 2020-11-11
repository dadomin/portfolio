<?php

use Damin\Route;

Route::get("/", "MainController@index");
Route::get("/games", "PageController@games");
Route::get("/game/paint", "GameController@paint");