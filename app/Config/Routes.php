<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/news', 'News::index');
$routes->get('/news/(:any)', 'News::viewNews/$1');
$routes->get('/pegawai', 'Pegawai::index');
$routes->get('/pegawai/divisi/(:segment)', 'Pegawai::divisi/$1');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'authguard'], function($routes){
	$routes->get('news', 'NewsAdmin::index');
	$routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
    $routes->add('news/new', 'NewsAdmin::create');
	$routes->add('news/(:segment)/edit', 'NewsAdmin::edit/$1');
	$routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');
	
	$routes->get('pegawai', 'PegawaiAdmin::index');
	$routes->add('pegawai/new', 'PegawaiAdmin::create');
	$routes->add('pegawai/(:segment)/edit', 'PegawaiAdmin::edit/$1');
	$routes->get('pegawai/(:segment)/delete', 'PegawaiAdmin::delete/$1');
});