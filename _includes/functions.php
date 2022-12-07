<?php


function print_header() {
    switch($PAGE->type) {
        case 'article': print_article_header(); break;
        default: print_main_header();
    }
}


function print_footer() {
    switch($PAGE->type) {
        case 'article': print_article_footer(); break;
        default: print_main_footer();
    }
}


function print_main_header() {
    include('main_header.php');
}


function print_main_footer() {
    include('main_footer.php');
}


function print_article_header() {
    print_main_header(); 
    include('article_header.php');
}


function print_article_footer() {
    include('article_footer.php');
    print_main_footer();
}