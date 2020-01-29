<?php

//Az útvonal aktuális útvonal kiszedése az url-ből
$uri = $_SERVER["REQUEST_URI"] ?? '/';

/** @var  type $cleaned */
$cleaned = explode("?", $uri)[0];

//dispatch() függvény meghívása, ami kiválasztja az adott útvonalhoz tartozó controllert.
list($view, $data) = dispatch($cleaned, 'notFoundController');
extract($data);