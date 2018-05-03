<?php
# Listagem
Route::get('/company', 'CompanyController@index');

# Item específico
Route::get('/company/{company}', 'CompanyController@show');

# Incluir
Route::post('/company', 'CompanyController@create');

# Alterar
Route::put('/company/{company}', 'CompanyController@update');

# Remover
Route::delete('/company/{company}', 'CompanyController@delete');