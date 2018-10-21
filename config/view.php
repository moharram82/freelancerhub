<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

/*
|--------------------------------------------------------------------------
| LOAD BLADE TEMPLATE ENGINE
|--------------------------------------------------------------------------
|
*/
$pathsToTemplates = [VIEWSPATH];
$pathToCompiledTemplates = BASEPATH . '/storage/views';
// Dependencies
$filesystem = new Filesystem;
$eventDispatcher = new Dispatcher(new Container);
// Create View Factory capable of rendering PHP and Blade templates
$viewResolver = new EngineResolver;
$bladeCompiler = new BladeCompiler($filesystem, $pathToCompiledTemplates);
$viewResolver->register('blade', function () use ($bladeCompiler) {
    return new CompilerEngine($bladeCompiler);
});
$viewResolver->register('php', function () {
    return new PhpEngine;
});
$viewFinder = new FileViewFinder($filesystem, $pathsToTemplates);
$view = new Factory($viewResolver, $viewFinder, $eventDispatcher);
