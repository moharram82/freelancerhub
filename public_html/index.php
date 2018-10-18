<?php

$page_meta = [
    'doc_title' => "Home - FreelancerHub",
    'page_title' => "Home",
    'doc_description' => "",
    'doc_keywords' => "",
    'doc_robots' => "",
    'doc_revisit_after' => "",
    'doc_distribution' => "",
    'og_type' => "article",
    'tw_card_type' => "",
    'tw_site' => "",
    'gp_type' => "",
    'language' => "en"
];

require_once '../init.php';

echo $view->make('home', $page_meta)->render();
