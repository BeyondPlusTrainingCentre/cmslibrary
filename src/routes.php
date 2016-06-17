<?php

Route::get('timezones/{timezone}', 
  'beyondplus\timezones\TimezonesController@index');