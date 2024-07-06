<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('dashboard', 'ExpenseController::index');
$routes->get('expense/form', 'ExpenseController::create');
$routes->post('expense/submit', 'ExpenseController::store');
$routes->get('expense/edit/(:num)', 'ExpenseController::singleExpense/$1');
$routes->post('expense/edit/submit', 'ExpenseController::update');
$routes->get('expense/delete/(:num)', 'ExpenseController::delete/$1');