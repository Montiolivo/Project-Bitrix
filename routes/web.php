<?php

use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Form'], function(){
    Route::get('form/novo ', 'TestController@formAdd')->name('br.formAdd');
    Route::get('form/contatos', 'TestController@listAllContacts')->name('br.listContacts');
    Route::get('form/empresa', 'TestController@listAllCompanies')->name('br.listCompanies');
    Route::get('form/editar/{contact}', 'TestController@formEditcontact')->name('br.formEditContact');
    Route::get('form/editar_empresa/{company}', 'TestController@formEditCompany')->name('br.formEditCompany');
    Route::post('form/send', 'TestController@sendForm')->name('br.send');
    Route::post('form/edit/{contact}', 'TestController@editContact')->name('br.edit');
    Route::post('form/edit_company/{company}', 'TestController@editCompany')->name('br.editCompany');
    Route::post('form/delete/{contact}', 'TestController@deleteContact')->name('br.delete');
    Route::post('form/delete_company/{company}', 'TestController@deleteCompany')->name('br.deleteCompany');

});



