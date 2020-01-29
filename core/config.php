<?php

$title = "Photo Gallery";

/**
 * $possiblePageSizes: lehetséges pageSize (oldalméret) értékek
 */

$possiblePageSizes = [5, 10, 20, 30, 50, 100];

/**
 * Adatbázis kapcsolódáshoz szükséges adatok
 */

$config['db_host'] = 'localhost';
$config['db_user'] = 'phpalapok';
$config['db_pass'] = 'phpalapok';
$config['db_name'] = 'phpalapok';

$routes = [];

//Útvonalak felvétele a $route tömbbe
$routes['GET']['/'] = 'homeController';
$routes['GET']['/about'] = 'aboutController';
$routes['GET']['/image/(?<id>[\d]+)'] = 'singleImageController';
$routes['POST']['/image/(?<id>[\d]+)/edit'] = 'singleImageEditController';
$routes['POST']['/image/(?<id>[\d]+)/delete'] = 'singleImageDeleteController';

