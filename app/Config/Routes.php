<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ─── Public routes ───────────────────────────────────────────────────
$routes->get('/',              'Home::index');
$routes->get('lang/(:segment)', 'LangController::index/$1');
$routes->get('about',          'Home::about');
$routes->get('teachers',       'Home::teachers');
$routes->get('admission',      'Home::admission');
$routes->get('notices',        'Home::notices');
$routes->get('notice-details', 'Home::notice_details');
$routes->get('contact',        'Home::contact');
$routes->get('results',        'Home::results');
$routes->get('routines',       'Home::routines');
$routes->get('gallery',        'Home::gallery');
$routes->get('downloads',      'Home::downloads');
$routes->get('academic-info',  'Home::academic_info');
$routes->get('administration', 'Home::administration');

// ─── Admin Auth (unprotected) ─────────────────────────────────────────
$routes->get( 'admin/login',  'Admin\AuthController::login');
$routes->post('admin/login',  'Admin\AuthController::doLogin');
$routes->get( 'admin/forgot-password', 'Admin\AuthController::forgotPassword');
$routes->get( 'admin/logout', 'Admin\AuthController::logout');

// ─── Admin Panel (auth-protected) ────────────────────────────────────
$routes->group('admin', ['filter' => 'auth'], function($routes) {

    $routes->get('/', 'Admin\DashboardController::index');
    $routes->addRedirect('dashboard', 'admin');

    // Notices
    $routes->get( 'notices',                    'Admin\NoticesController::index');
    $routes->get( 'notices/create',             'Admin\NoticesController::create');
    $routes->post('notices/store',              'Admin\NoticesController::store');
    $routes->get( 'notices/edit/(:num)',        'Admin\NoticesController::edit/$1');
    $routes->post('notices/update/(:num)',      'Admin\NoticesController::update/$1');
    $routes->post('notices/delete/(:num)',      'Admin\NoticesController::delete/$1');
    $routes->post('notices/toggle/(:num)',      'Admin\NoticesController::toggleStatus/$1');

    // Notice Categories
    $routes->get( 'notice-categories',               'Admin\NoticeCategoriesController::index');
    $routes->get( 'notice-categories/create',        'Admin\NoticeCategoriesController::create');
    $routes->post('notice-categories/store',         'Admin\NoticeCategoriesController::store');
    $routes->get( 'notice-categories/edit/(:num)',   'Admin\NoticeCategoriesController::edit/$1');
    $routes->post('notice-categories/update/(:num)', 'Admin\NoticeCategoriesController::update/$1');
    $routes->post('notice-categories/delete/(:num)', 'Admin\NoticeCategoriesController::delete/$1');

    // Pages
    $routes->get( 'pages',                'Admin\PagesController::index');
    $routes->get( 'pages/create',         'Admin\PagesController::create');
    $routes->post('pages/store',          'Admin\PagesController::store');
    $routes->get( 'pages/edit/(:num)',    'Admin\PagesController::edit/$1');
    $routes->post('pages/update/(:num)', 'Admin\PagesController::update/$1');
    $routes->post('pages/delete/(:num)', 'Admin\PagesController::delete/$1');

    // Teachers
    $routes->get( 'teachers',                 'Admin\TeachersController::index');
    $routes->get( 'teachers/create',          'Admin\TeachersController::create');
    $routes->post('teachers/store',           'Admin\TeachersController::store');
    $routes->get( 'teachers/edit/(:num)',     'Admin\TeachersController::edit/$1');
    $routes->post('teachers/update/(:num)',   'Admin\TeachersController::update/$1');
    $routes->post('teachers/delete/(:num)',   'Admin\TeachersController::delete/$1');
    $routes->post('teachers/toggle/(:num)',   'Admin\TeachersController::toggleStatus/$1');

    // Staff
    $routes->get( 'staff',                'Admin\StaffController::index');
    $routes->get( 'staff/create',         'Admin\StaffController::create');
    $routes->post('staff/store',          'Admin\StaffController::store');
    $routes->get( 'staff/edit/(:num)',    'Admin\StaffController::edit/$1');
    $routes->post('staff/update/(:num)', 'Admin\StaffController::update/$1');
    $routes->post('staff/delete/(:num)', 'Admin\StaffController::delete/$1');

    // Routines
    $routes->get( 'routines',                'Admin\RoutinesController::index');
    $routes->get( 'routines/create',         'Admin\RoutinesController::create');
    $routes->post('routines/store',          'Admin\RoutinesController::store');
    $routes->get( 'routines/edit/(:num)',    'Admin\RoutinesController::edit/$1');
    $routes->post('routines/update/(:num)', 'Admin\RoutinesController::update/$1');
    $routes->post('routines/delete/(:num)', 'Admin\RoutinesController::delete/$1');

    // Results
    $routes->get( 'results',                'Admin\ResultsController::index');
    $routes->get( 'results/create',         'Admin\ResultsController::create');
    $routes->post('results/store',          'Admin\ResultsController::store');
    $routes->get( 'results/edit/(:num)',    'Admin\ResultsController::edit/$1');
    $routes->post('results/update/(:num)', 'Admin\ResultsController::update/$1');
    $routes->post('results/delete/(:num)', 'Admin\ResultsController::delete/$1');

    // Academic Calendar
    $routes->get( 'academic-calendar',                'Admin\AcademicCalendarController::index');
    $routes->get( 'academic-calendar/create',         'Admin\AcademicCalendarController::create');
    $routes->post('academic-calendar/store',          'Admin\AcademicCalendarController::store');
    $routes->get( 'academic-calendar/edit/(:num)',    'Admin\AcademicCalendarController::edit/$1');
    $routes->post('academic-calendar/update/(:num)', 'Admin\AcademicCalendarController::update/$1');
    $routes->post('academic-calendar/delete/(:num)', 'Admin\AcademicCalendarController::delete/$1');

    // Admission
    $routes->get( 'admission',      'Admin\AdmissionController::index');
    $routes->post('admission/save', 'Admin\AdmissionController::save');

    // Gallery
    $routes->get( 'gallery',                        'Admin\GalleryController::index');
    $routes->get( 'gallery/create',                 'Admin\GalleryController::create');
    $routes->post('gallery/store',                  'Admin\GalleryController::store');
    $routes->get( 'gallery/edit/(:num)',             'Admin\GalleryController::edit/$1');
    $routes->post('gallery/update/(:num)',           'Admin\GalleryController::update/$1');
    $routes->post('gallery/delete/(:num)',           'Admin\GalleryController::delete/$1');
    $routes->post('gallery/image-delete/(:num)',     'Admin\GalleryController::deleteImage/$1');

    // Downloads
    $routes->get( 'downloads',                'Admin\DownloadsController::index');
    $routes->get( 'downloads/create',         'Admin\DownloadsController::create');
    $routes->post('downloads/store',          'Admin\DownloadsController::store');
    $routes->get( 'downloads/edit/(:num)',    'Admin\DownloadsController::edit/$1');
    $routes->post('downloads/update/(:num)', 'Admin\DownloadsController::update/$1');
    $routes->post('downloads/delete/(:num)', 'Admin\DownloadsController::delete/$1');

    // Messages
    $routes->get( 'messages',               'Admin\MessagesController::index');
    $routes->get( 'messages/(:num)',         'Admin\MessagesController::show/$1');
    $routes->post('messages/toggle/(:num)', 'Admin\MessagesController::toggleRead/$1');
    $routes->post('messages/delete/(:num)', 'Admin\MessagesController::delete/$1');

    // Feedback
    $routes->get( 'feedback',                       'Admin\FeedbackController::index');
    $routes->get( 'feedback/(:num)',                 'Admin\FeedbackController::show/$1');
    $routes->post('feedback/status/(:num)',          'Admin\FeedbackController::updateStatus/$1');
    $routes->post('feedback/delete/(:num)',          'Admin\FeedbackController::delete/$1');

    // Users
    $routes->get( 'users',                'Admin\UsersController::index');
    $routes->get( 'users/create',         'Admin\UsersController::create');
    $routes->post('users/store',          'Admin\UsersController::store');
    $routes->get( 'users/edit/(:num)',    'Admin\UsersController::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\UsersController::update/$1');
    $routes->post('users/delete/(:num)', 'Admin\UsersController::delete/$1');
    $routes->post('users/toggle/(:num)', 'Admin\UsersController::toggleStatus/$1');

    // Roles
    $routes->get( 'roles',               'Admin\RolesController::index');
    $routes->get( 'roles/create',        'Admin\RolesController::create');
    $routes->post('roles/store',         'Admin\RolesController::store');
    $routes->get( 'roles/edit/(:num)',   'Admin\RolesController::edit/$1');
    $routes->post('roles/update/(:num)','Admin\RolesController::update/$1');
    $routes->post('roles/delete/(:num)','Admin\RolesController::delete/$1');

    // Settings
    $routes->get( 'settings',        'Admin\SettingsController::index');
    $routes->post('settings/update', 'Admin\SettingsController::update');

    // Profile
    $routes->get( 'profile',                  'Admin\ProfileController::index');
    $routes->post('profile/update',           'Admin\ProfileController::update');
    $routes->post('profile/change-password',  'Admin\ProfileController::changePassword');
});
