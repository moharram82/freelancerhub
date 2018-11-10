<?php

use Illuminate\Pagination\Paginator;

/*
|--------------------------------------------------------------------------
| LOAD BLADE TEMPLATE ENGINE
|--------------------------------------------------------------------------
|
*/
// Set the view factory resolver
Paginator::viewFactoryResolver(function () use ($view) {
    return $view;
});
// Set up a current path resolver so the paginator can generate proper links
Paginator::currentPathResolver(function () {
    return isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
});
// Set up a current page resolver
Paginator::currentPageResolver(function ($pageName = 'page') {
    $page = isset($_REQUEST[$pageName]) ? $_REQUEST[$pageName] : 1;
    return $page;
});
