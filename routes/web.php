<?php

Auth::routes();
Route::get('/', ['as' => 'home', 'uses' => 'Site\HomeController@home']);
Route::get('/home', ['as' => 'home', 'uses' => 'Site\HomeController@home']);

Route::get('/explore', ['as' => 'explore.all', 'uses' => 'Site\ExploreController@all']);
Route::get('/view/{space_id}/{slug}', ['as' => 'explore.view', 'uses' => 'Site\ExploreController@view']);

Route::group(['middleware' 	=> ['auth']], function () {

    Route::get('/explore/registered', ['as' => 'explore.registered', 'uses' => 'Site\ExploreController@registered']);
    Route::get('/explore/message-success', ['as' => 'explore.message_success', 'uses' => 'Site\ExploreController@messageSuccess']);

    Route::get('/spaces/create', ['as' => 'spaces.create', 'uses' => 'Site\SpacesController@create']);
    Route::get('/spaces/success', ['as' => 'spaces.success', 'uses' => 'Site\SpacesController@success']);
    Route::get('/spaces/all', ['as' => 'spaces.all', 'uses' => 'Site\SpacesController@all']);


    /**
     * API
     */
    Route::group(['prefix' => 'api'], function() {
        Route::post('/spaces/create', ['as' => 'api.spaces.create', 'uses' => 'Api\SpacesController@create']);
        Route::post('/image/upload', ['as' => 'api.image.upload_image', 'uses' => 'Api\ImageController@uploadImage']);

        Route::post('/messages/send', ['as' => 'api.messages.send', 'uses' => 'Api\MessagesController@send']);

        Route::group(['prefix' => 'location'], function() {
            Route::get('/states', ['as' => 'api.location.states', 'uses' => 'Api\StatesController@getAll']);
            Route::get('/cities', ['as' => 'api.location.cities', 'uses' => 'Api\CitiesController@getAll']);
        });

    });
});



Route::group(['prefix' => 'admin', 'middleware' => 'admin'] ,function(){

    Route::get('/',
        [
            'uses' => 'Admin\AdminController@index',
            'as' => 'admin'
        ]);

    Route::get('/spaces',
        [
            'uses' => 'Admin\SpacesController@index',
            'as' => 'spaces'
        ]);

    Route::get('/space/create',
        [
            'uses' => 'Admin\SpacesController@create',
            'as' => 'createSpace'
        ]);

    Route::post('/space/create',
        [
            'uses' => 'Admin\SpacesController@store',
            'as' => 'createSpace'
        ]);

    Route::delete('/space/delete/{id}',
        [
            'uses' => 'Admin\SpacesController@destroy',
            'as' => 'deleteSpace'
        ]);

    Route::get('/users',
        [
            'uses' => 'Admin\UsersController@index',
            'as' => 'users'
        ]);

    Route::delete('/user/delete/{id}',
        [
            'uses' => 'Admin\UsersController@destroy',
            'as' => 'deleteUser'
        ]);

    Route::get('/user/edit/{id}',
        [
            'uses' => 'Admin\UsersController@edit',
            'as' => 'editUser'
        ]);

    Route::post('/user/edit/{id}',
        [
            'uses' => 'Admin\UsersController@update',
            'as' => 'updateUser'
        ]);


    Route::get('/userTypes',
        [
            'uses' => 'Admin\UserTypesController@index',
            'as' => 'userTypes'
        ]);



    Route::delete('/userType/delete/{id}',
        [
            'uses' => 'Admin\UserTypesController@destroy',
            'as' => 'deleteUser'
        ]);

    Route::get('/userType/edit/{id}',
        [
            'uses' => 'Admin\UserTypesController@edit',
            'as' => 'editUserType'
        ]);

    Route::post('/userType/edit/{id}',
        [
            'uses' => 'Admin\UserTypesController@update',
            'as' => 'updateUserType'
        ]);

    Route::get('userType/create',[

        'uses' => 'Admin\UserTypesController@create',
        'as' => 'createUserType'

    ]);

    Route::post('userType/create',[

        'uses' => 'Admin\UserTypesController@store',
        'as' => 'createUserType'

    ]);











    Route::get('/amenities',
        [
            'uses' => 'Admin\AmenitiesController@index',
            'as' => 'amenities'
        ]);



    Route::delete('/amenity/delete/{id}',
        [
            'uses' => 'Admin\AmenitiesController@destroy',
            'as' => 'deleteAmenity'
        ]);

    Route::get('/amenity/edit/{id}',
        [
            'uses' => 'Admin\AmenitiesController@edit',
            'as' => 'editAmenity'
        ]);

    Route::post('/amenity/edit/{id}',
        [
            'uses' => 'Admin\AmenitiesController@update',
            'as' => 'updateAmenity'
        ]);

    Route::get('amenity/create',[

        'uses' => 'Admin\AmenitiesController@create',
        'as' => 'createAmenity'

    ]);

    Route::post('amenity/create',[

        'uses' => 'Admin\AmenitiesController@store',
        'as' => 'createAmenity'

    ]);



});
