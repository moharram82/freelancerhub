<?php

$page_meta = [
    'doc_title' => "Test",
    'page_title' => "Test",
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

echo $view->make('test', $page_meta)->render();
?>
