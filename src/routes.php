
<?php

use Illuminate\Session\TokenMismatchException;

/********************************
 ********* START FRONT ***********
 ********************************/


Route::get('/contact', [
    'as' => 'contact',
    'uses' => 'Foostart\Contact\Controllers\Front\ContactFrontController@index'
    ]);

Route::get('/detail', [
    'as' => 'detail',
    'uses' => 'Foostart\Contact\Controllers\Front\ContactFrontController@detail'
    ]);

/*FUNCTION ADD NEW*/
Route::post('/send', [
    'as' => 'send',
    'uses' => 'Foostart\Contact\Controllers\Front\ContactFrontController@add'
    ]);

/*FUNCTION EDIT*/
Route::get('contact/edit', [
    'as' => 'contact.edit',
    'uses' => 'Foostart\Contact\Controllers\Front\ContactFrontController@edit'
    ]);

/*FUNCTION UPDATE*/
Route::post('contact/edit', [
    'as' => 'contact.post',
    'uses' => 'Foostart\Contact\Controllers\Front\ContactFrontController@post'
    ]);

/*FUNCTION DELETE*/
Route::get('contact/delete', [
    'as' => 'contact.delete',
    'uses' => 'Foostart\Contact\Controllers\Front\ContactFrontController@delete'
    ]);


/********************************
 ********* END FRONT ************
 ********************************/


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web'],'namespace'=>'Foostart\Contact\Controllers\Admin'], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {



        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CONTACT ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/contact', [
            'as' => 'admin_contact',
            'uses' => 'ContactAdminController@index'
            ]);


        /**
         * edit-add
         */
        Route::get('admin/contact/edit', [
            'as' => 'admin_contact.edit',
            'uses' => 'ContactAdminController@edit'
            ]);

        /**
         * post
         */
        Route::post('admin/contact/edit', [
            'as' => 'admin_contact.post',
            'uses' => 'ContactAdminController@post'
            ]);

        /**
         * delete
         */
        Route::get('admin/contact/delete', [
            'as' => 'admin_contact.delete',
            'uses' => 'ContactAdminController@delete'
            ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CONTACT ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        Route::get('admin/contact_category', [
            'as' => 'admin_contact_category',
            'uses' => 'ContactCategoryAdminController@index'
            ]);

        /**
         * edit-add
         */
        Route::get('admin/contact_category/edit', [
            'as' => 'admin_contact_category.edit',
            'uses' => 'ContactCategoryAdminController@edit'
            ]);

        /**
         * post
         */
        Route::post('admin/contact_category/edit', [
            'as' => 'admin_contact_category.post',
            'uses' => 'ContactCategoryAdminController@post'
            ]);
         /**
         * delete
         */
         Route::get('admin/contact_category/delete', [
            'as' => 'admin_contact_category.delete',
            'uses' => 'ContactCategoryAdminController@delete'
            ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
     });
});
