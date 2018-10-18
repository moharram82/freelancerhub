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

/*
|--------------------------------------------------------------------------
| Social Links
|--------------------------------------------------------------------------
|
| Links to social media profiles, eg: facebook, twitter, google plus...
|
*/
$facebookLink = "https://www.facebook.com/";
$twitterLink = "https://twitter.com/";
$googlePlusLink = "https://plus.google.com/";

/*
|--------------------------------------------------------------------------
| Page Template Settings
|--------------------------------------------------------------------------
|
| Initialize page default variables & meta data
|
*/
$default_doc_title = "Test Page";
$default_page_title = "Test Page";
$default_doc_description = "";
$default_doc_keywords = "";
$default_doc_robots = "index, follow";
$default_doc_revisit_after = "7 days";
$default_doc_distribution = "global";
$default_og_type = "website";
$default_og_image = BASEURL . "/img/social/fb_default_image.jpg";
$default_og_image_type = 'image/png';
$default_og_image_width = "1200";
$default_og_image_height = "630";
$default_og_locale = "en_US";
$default_tw_card_type = 'summary';
$default_tw_site = '@test';
$default_tw_image = BASEURL . "/img/social/tw_default_image.jpg";
$default_gp_type = 'http://schema.org/Article';
$default_gp_image = BASEURL . "/img/social/gp_default_image.jpg";

// check page variables & meta data
if(!isset($page_meta['doc_title']) || $page_meta['doc_title'] == "") {
    $page_meta['doc_title'] = $default_doc_title;
}

if(!isset($page_meta['page_title']) || $page_meta['page_title'] == "") {
    $page_meta['page_title'] = $default_page_title;
}

if(!isset($page_meta['doc_description']) || $page_meta['doc_description'] == "") {
    $page_meta['doc_description'] = $default_doc_description;
}

if(!isset($page_meta['doc_keywords']) || $page_meta['doc_keywords'] == "") {
    $page_meta['doc_keywords'] = $default_doc_keywords;
}

if(!isset($page_meta['doc_robots']) || $page_meta['doc_robots'] == "") {
    $page_meta['doc_robots'] = $default_doc_robots;
}

if(!isset($page_meta['doc_revisit_after']) || $page_meta['doc_revisit_after'] == "") {
    $page_meta['doc_revisit_after'] = $default_doc_revisit_after;
}

if(!isset($page_meta['doc_distribution']) || $page_meta['doc_distribution'] == "") {
    $page_meta['doc_distribution'] = $default_doc_distribution;
}

if(!isset($page_meta['og_type']) || $page_meta['og_type'] == "") {
    $page_meta['og_type'] = $default_og_type;
}

if(!isset($page_meta['og_image']) || $page_meta['og_image'] == "") {
    $page_meta['og_image'] = $default_og_image;
}

if(!isset($page_meta['og_image_type']) || $page_meta['og_image_type'] == "") {
    $page_meta['og_image_type'] = $default_og_image_type;
}

if(!isset($page_meta['og_image_width']) || $page_meta['og_image_width'] == "") {
    $page_meta['og_image_width'] = $default_og_image_width;
}

if(!isset($page_meta['og_image_height']) || $page_meta['og_image_height'] == "") {
    $page_meta['og_image_height'] = $default_og_image_height;
}

if(!isset($page_meta['og_locale']) || $page_meta['og_locale'] == "") {
    $page_meta['og_locale'] = $default_og_locale;
}

if(!isset($page_meta['tw_card_type']) || $page_meta['tw_card_type'] == "") {
    $page_meta['tw_card_type'] = $default_tw_card_type;
}

if(!isset($page_meta['tw_site']) || $page_meta['tw_site'] == "") {
    $page_meta['tw_site'] = $default_tw_site;
}

if(!isset($page_meta['tw_image']) || $page_meta['tw_image'] == "") {
    $page_meta['tw_image'] = $default_tw_image;
}

if(!isset($page_meta['gp_type']) || $page_meta['gp_type'] == "") {
    $page_meta['gp_type'] = $default_gp_type;
}

if(!isset($page_meta['gp_image']) || $page_meta['gp_image'] == "") {
    $page_meta['gp_image'] = $default_gp_image;
}
