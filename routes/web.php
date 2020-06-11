<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function(){
    return str_random(32);
});

$router->get('/welcome', function () use ($router) {
    $res['success'] = true;
    $res['result'] = "Hello there welcome to web api using lumen tutorial!";
    return response($res);
  });
  $router->post('/login', 'LoginController@index');
  $router->post('/register', 'UserController@register');
  $router->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);




  /*
 | ------------------------------------------
 | CRUD Routes using auth middleware
 | ------------------------------------------
 */
 $router->get('/member', 'memberAdsController@index');
 $router->get('/member/{id}', 'memberAdsController@read');
 $router->post('/member', 'memberAdsController@create');
 $router->post('/member/update/{id}', 'memberAdsController@update');
 $router->get('/member/delete/{id}', 'memberAdsController@delete');


   /* Route item ads */
   $router->get('/utang', 'ItemAdsController@index');
   $router->get('/utang/{id}', 'ItemAdsController@read');
   $router->get('/utang/delete/{id}', 'ItemAdsController@delete');
   $router->post('/utang/create', 'ItemAdsController@create');
   $router->post('/utang/update/{id}', 'ItemAdsController@update');