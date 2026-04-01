<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('teachers', 'Home::teachers');
$routes->get('admission', 'Home::admission');
$routes->get('notices', 'Home::notices');
$routes->get('notice-details', 'Home::notice_details');
$routes->get('contact', 'Home::contact');
$routes->get('results', 'Home::results');
$routes->get('routines', 'Home::routines');
$routes->get('gallery', 'Home::gallery');
$routes->get('downloads', 'Home::downloads');
$routes->get('academic-info', 'Home::academic_info');
$routes->get('administration', 'Home::administration');
