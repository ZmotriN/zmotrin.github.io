<?php



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