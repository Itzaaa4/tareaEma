<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\learning;
use App\Controllers\Panel\Dashboard;
use CodeIgniter\Commands\Utilities\Routes;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/learning', [learning::class,'index']);

//$routes->get('/inicio_secion',[login:: class, 'index']);

$routes->get('/dashboard', [Dashboard::class, 'index']);

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::processLogin');
$routes->get('logout', 'Login::logout');



$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});